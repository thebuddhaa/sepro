<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class HomeController extends Controller
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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Display Home page
	 *
	 * @return $this
	 */

	public static function gotohome()
	{
		$hname = Auth::user();
		$hmail = Auth::user()->email;
		$huname = Auth::user()->username;
		$user_earlier_booked = DB::table('roombook')->where('user', $huname)->get();

		return view('home')->with(['user_earlier_booked' => $user_earlier_booked])
			->with('hname', $hname);
	}

	public static function getbookedRooms()
	{
		$all_booked_rooms = DB::table('roombook')->get();
        return view('bookedrooms')->with(['all_booked_rooms' => $all_booked_rooms]);
	}

}
