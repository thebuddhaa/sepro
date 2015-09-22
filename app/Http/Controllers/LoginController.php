<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Input;
// use Input;

class LoginController extends Controller
{
    public function login()
    {
        $uname = Input::get('username');
        $pass = Input::get('password');
        // return view('user.logintry')->with('uname',$uname);//,array('uname'=>$uname));
        if(Auth::attempt(['username' => $uname, 'password' => $pass])) {
            return redirect()->intended('dashboard'); 
        }
        else return"NOt found";
//        return Redirect::to('logintry')->with('uname',$uname);
        // return Redirect::route('logintry')->with('uname', $uname);
    }

    public function logintry()
    {
        return $uname;
        // return view('user.logintry',array('uname'=>$uname));
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('user.login');
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
}
