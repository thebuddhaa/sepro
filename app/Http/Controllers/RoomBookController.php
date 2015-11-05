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

class RoomBookController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roomnos = RoomInfo::getRoomNos();
		$uname = Auth::user()->username;
		return view('roombook', ['rooms' => $roomnos, 'uname' => $uname]);
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

	public function roombook()
	{
//        $roombookinginstance = Input::get('room_no');
//        $Roombookings = \DB::table('roombook')->lists('room_no', 'id', 'starttime');
//        $Roombookings = \DB::table('roombook')->where('room_no', $roombookinginstance);
//        foreach ($Roombookings as $Roombooking) {
//            if($Roombooking->starttime > $roombookinginstance->starttime )

//        }
		return ("Success");
	}

	public function gotoroomcancel()
	{
		$uname = Auth::user()->username;

		$bookingids = RoomBook::getBookingIDByUserID($uname);

		return view('roombookcancel')->with('uname',$uname)
				->with('bookedrooms', $bookingids);
	}

	public function roomcancel(Request $request)
	{
		$uname = $request->input('user');
		$bookingid = $request->input('bookingid');

		$data = ['username' => $uname, 'id' => $bookingid ];
		$ust = $this->promoteBooking($bookingid);
		$status = RoomBook::delbooking($data);
		if($status == 1)
			$msg = "Booking Cancelled";
		else
			$msg = "There was some problem with cancellation";
			return redirect('roombookcancel')->with('statusmsg',$msg);


	}

	public static function promoteBooking($bookingid)
	{
		// get list of rooms with waiting status on the same room
		// sort the output in ascending order and pick 1st row
		// change its booking status to C

		$oldbooking = DB::table('roombook')->where('id', $bookingid)->get();
//		dd($oldbooking[0]->id);

		$waitingroom = DB::table('roombook')
			->where('starttime', '<', $oldbooking[0]->endtime)
			->where('starttime', '>', $oldbooking[0]->starttime)
			->where('status', 'W')
			->orderBy('id')
			->first();

		if($waitingroom)
		{
			$updstatus = DB::table('roombook')
				->where('id', $waitingroom->id)
				->update(['status' => 'C']);
		}
		else
		{
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
