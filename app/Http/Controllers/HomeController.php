<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\User;
use Mail;
use Input;

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
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
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
     * Display Home page
     *
     * @return $this
     */

    public static function gotohome()
    {
        $hname = Auth::user();
        $hmail = Auth::user()->email;
        $huname = Auth::user()->username;
        $user_earlier_booked = DB::table('roombook')
            ->where('user', $huname)
            ->where('endtime','>',Carbon::now())
            ->get();

        $newuser = User::where('status','R')
            ->count();

        if ($hname->status == 'R')
            return redirect('awaitingconfirmation');
        else
            return view('home')->with(['user_earlier_booked' => $user_earlier_booked])
                ->with('hname', $hname)
                ->with('nusers',$newuser);
    }

    /**
     * Get all the currently booked rooms
     *
     * @return $this
     */
    public static function getbookedRooms()
    {
        $all_booked_rooms = DB::table('roombook')
            ->where('endtime','>',Carbon::now())
            ->where('status','C')
            ->get();
        return view('bookedrooms')->with(['all_booked_rooms' => $all_booked_rooms]);
    }

    /**
     * Retrieve previous booked rooms for the user
     *
     * @return $this
     */
    public static function getPrevBookedRooms()
    {
        $user = Auth::user()->username;

        $all_booked_rooms = DB::table('roombook')
            ->where('user', $user)
            ->where('endtime','<',Carbon::now())
            ->get();
        return view('bookedrooms')->with(['all_booked_rooms' => $all_booked_rooms]);
    }

    /**
     * Home page for Unauthorized Users
     *
     * @return $this
     */
    public static function awaitingconf()
    {
        $hname = Auth::user();
        return view('awaitingconfirmation')->with('hname', $hname);
    }

    /**
     * View New Unauthorized Users
     *
     * @return $this
     */
    public static function viewNewUsers()
    {
        $hname = Auth::user();
        $newusers = User::getNewUsers();

//        return $newusers->toArray();

        return view('authorizeusers')
            ->with('hname', $hname)
            ->with('newusers', $newusers);
    }

    public function authorizeUser(Request $request)
    {
        if ($request->get('confirm'))
            return $this->postConfirmUser($request);
        if ($request->get('delete'))
            return $this->postDeleteUser($request);
//        return $request->except('_token');
    }

    /**
     * Confirm User registration Handler
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postConfirmUser(Request $request)
    {
        $user = $request->except(array('_token'));

        $status = User::where('id', $user['uid'])
            ->where('status', 'R')
            ->update(['status' => 'A']);
        if ($status == 1) {
            $msg = "User Registration Confirmed";

            Mail::queue('emails.welcome', array('firstname'=>$request->get('name')), function($message){
                $message->to(Input::get('email'), Input::get('name'))->subject('Welcome!!');
            });
        }
        else
            $msg = "There was a problem with Updating User credentials";

        return redirect('confirmusers')->with('statusmsg', $msg);

//        return array_get($user, 'name');
//        return $user['user'];
    }

    /**
     * Delete User handler
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDeleteUser(Request $request)
    {
        $user = $request->except(array('_token'));

        $status = User::where('id', $user['uid'])
            ->where('status', 'R')
            ->delete();
        if ($status == 1)
            $msg = "User Registration Cancelled";
        else
            $msg = "There was a problem with Deleting User Information";

        return redirect('confirmusers')->with('statusmsg', $msg);
    }

    /**
     * View List of current Users
     *
     * @return $this
     */
    public static function viewCurrUsers()
    {
        $allusers = User::all();

        return view('viewcurrentusers')
            ->with('allusers', $allusers);
    }

    /**
     * Send an e-mail reminder to the user.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function sendEmailConfirmation(Request $request, $id)
    {
        $user = User::findOrFail($id);

        Mail::queue('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('admin@easybook.com', 'Room Booking System');

            $m->to($user->email, $user->name)->subject('Booking confirmed!');
        });
    }

}
