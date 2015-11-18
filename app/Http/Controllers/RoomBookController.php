<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\RoomBook;
use App\RoomInfo;
use DB;
use Config;
use Mail;

class RoomBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //$room_no = \DB::table('room_info')->lists('room_no', 'id');
    }

    /**
     * Display Room Booking form
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function gotoroombook()
    {
        $settings = (Config::get('roomconfig.event_types'));
//        return $settings;
//        $eventnames;
        foreach ($settings as $key => $value) {
            $eventnames[$key] = $value['event'];
        }
//        return $eventnames;
        $roomnos = RoomInfo::getRoomNos();
        $uname = Auth::user()->username;

        // Check user booking limit
        $bookinglimit = Config::get('roomconfig.user_limit');
        $nouserbookings = RoomBook::where('user', $uname)
            ->where('starttime', '>', Carbon::now())
            ->count();

        if ($nouserbookings >= $bookinglimit)
            return redirect('roombook')->with('statusmsg', 'Room Booking Limit Reached');
        // Check user booking limit end


        return view('roombook', ['rooms' => $roomnos, 'uname' => $uname, 'eventtypes' => $eventnames]);
    }

    /**
     * Return the list of rooms with capacity greater than the argument passed
     *
     * @param Request $request
     * @return array|string
     */
    public function getroomswithcap(Request $request)
    {

//		if ( Session::token() !== Input::get( '_token' ) ) {
//			return Response::json( array(
//				'msg' => 'Unauthorized attempt to create setting'
//			) );
//		}

        if ($request->ajax()) {
//		return "AJAX";
            $data = $request->get('data1');

            $availrooms = RoomInfo::getRoomsGreaterThanCapacity($data);

            return $availrooms;
//		return \Response::json(['success'=>true,'data'=>$data]);

//		return \Response::json(array(
//			'success' => true,
//			'data'   => $data
//		));
//		return Response::json($data);
//		return Response::json($response);
        } else
            return "HTTP";
    }

    /**
     * Display Room Cancel Form
     *
     * @return $this
     */
    public function gotoroomcancel()
    {
        $uname = Auth::user()->username;

        $bookingids = RoomBook::getBookingIDByUserID($uname);

        return view('roombookcancel')->with('uname', $uname)
            ->with('bookedrooms', $bookingids);
    }

    /**
     * Room Cancel Function
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function roomcancel(Request $request)
    {
        $uname = $request->input('user');
        $bookingid = $request->input('bookingid');
        $status = 0;

        $data = ['username' => $uname, 'id' => $bookingid];
        $ust = $this->promoteBooking($bookingid);

        $status = RoomBook::delbooking($data);
        if ($status == 1)
            $msg = "Booking Cancelled";
        else
            $msg = "There was some problem with cancellation";
        return redirect('roombookcancel')->with('statusmsg', $msg);


    }

    /**
     * Returns the next request to be confirmed
     *
     * @param $bookingid
     * @return int
     */
    public static function promoteBooking($bookingid)
    {
        // get list of rooms with waiting status on the same room
        // sort the output in ascending order of priority and request time
        // and pick 1st row change its booking status to C

        $oldbooking = DB::table('roombook')->where('id', $bookingid)->get();
//		dd($oldbooking[0]->id);

        $waitingroom = DB::table('roombook')
            ->where('starttime', '<=', $oldbooking[0]->endtime)
            ->where('starttime', '>=', $oldbooking[0]->starttime)
            ->where('status', 'W')
            ->orderBy('priority')
            ->orderBy('id')
            ->first();

        if ($waitingroom) {
            // Sending Mail to User for room availability confirmation
            $userinfo = DB::table('users')
                ->where('username', $waitingroom->user)
                ->first();
//            ->lists('email','name');
//        dd($waitingroom);
//        return $waitingroom['user'];

            $data = array(
                'name' => $userinfo->name,
                'event' => $waitingroom->purpose,
                'roomno' => $waitingroom->room_no,
                'from' => $waitingroom->starttime,
                'to' => $waitingroom->endtime,
            );

            Mail::queue('emails.waitingconfirm', $data, function ($message) use ($userinfo) {
                $message->to($userinfo->email)->subject('Waiting Confirmed');
            });
        }
        // Mail send complete

        if ($waitingroom) {
            $updstatus = DB::table('roombook')
                ->where('id', $waitingroom->id)
                ->update(['status' => 'C']);
        } else {
            $updstatus = 0;
        }

        return $updstatus;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $hname = Auth::user();

        $rno = Input::get('room_no');

        $st = Carbon::createFromFormat('d-m-Y H:i', Input::get('starttime'));
        $et = Carbon::createFromFormat('d-m-Y H:i', Input::get('endtime'));

        $currbooking = RoomBook::where('room_no', $rno)
            ->where('starttime', '<', $et)
            ->where('endtime', '>', $st)->get();

        $otherinputs = Input::except(array('_token', 'starttime', 'endtime'));
        $otherinputs['starttime'] = $st;
        $otherinputs['endtime'] = $et;

        $evttype = Input::get('eventtype');
        $evtconfig = Config::get('roomconfig.event_types');

        $otherinputs['priority'] = $evtconfig[$evttype]['priority'];

        if (!count($currbooking)) {

            $otherinputs['status'] = 'C';
            RoomBook::saveFormData($otherinputs);

            return redirect('home');
        } else {
            $otherinputs['status'] = 'W';
            RoomBook::saveFormData($otherinputs);

            return redirect('home');
        }

//		return ("room booked");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
