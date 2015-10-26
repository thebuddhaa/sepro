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
		return view('roombook');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$room_no = \DB::table('room_info')->lists('room_no', 'id');
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
		return view('roombookcancel');
	}

	public function roomcancel(Request $request)
	{
		$uname = Input::get('user');
		$bookingid = Input::get('bookingid');

		$data = ['username' => $uname, 'id' => $bookingid ];


		RoomBook::delbooking($data);
//        RoomBook::delbooking(Input::except(array('_token')));

		return view('roombookcancel');
//        return DB::table('roombook')->where('user', $uname)
//            ->where('id',$bookingid)
//            ->get();
	}

	public function home()
	{
		$hname = Auth::user();
		$hmail = Auth::user()->email;
		$huname = Auth::user()->username;
		$user_earlier_booked = DB::table('roombook')->where('user', $huname)->get();
		$all_booked_rooms = DB::table('roombook')->get();
		return view('home')->with(['user_earlier_booked' => $user_earlier_booked])
			->with('hname', $hname)
			->with(['all_booked_rooms' => $all_booked_rooms]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
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

//            return ("Room Booked");
			return view('home');
		} else {
			$otherinputs['status'] = 'W';
			RoomBook::saveFormData($otherinputs);

			return view('home');
		}
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
