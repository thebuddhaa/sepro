<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\RoomBook;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        RoomBook::saveFormData(Input::except(array('_token')));
        return ("Success");//
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
}
