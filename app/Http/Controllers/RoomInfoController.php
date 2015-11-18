<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RoomInfo;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoomInfoController extends Controller
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
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $roomno = $request->get('room_no');
        $roomexists = RoomInfo::where('room_no',$roomno)->value('room_no');

        if($roomexists)
            $retstatus = 0;
        else
            $retstatus = RoomInfo::saveFormData($request->except(array('_token')));
        if (is_null($retstatus))
            $msg = "New Room Added";
        else
            $msg = "There was some problem with adding this room";
//        dd($msg);
//        return view('addroom')->with('statusmsg',$msg);
        return redirect('addroom')->with('statusmsg',$msg);
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

    /**
     * Display Add Room Form
     *
     * @return \Illuminate\View\View
     */
    public function addroom()
    {
        return view('addroom');
    }

    /**
     * View Current Rooms
     *
     * @param Request $request
     * @return $this
     */
    public function viewroom(Request $request)
    {
        $lsofrooms = RoomInfo::getallRooms();
        return view('viewroom')->with(['lsofrooms' => $lsofrooms]);
//		return view('viewroom');
    }
}
