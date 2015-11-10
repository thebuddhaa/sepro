<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// GET route

// Route::get('profile', ['middleware' => 'auth.basic', function() {
//     // Only authenticated users may enter...
//     return "Only Authenticated  users allowed..";
// }]);

//Route::get('login', 'LoginController@index');
//Route::post('loginpost', 'LoginController@login');
//
//Route::get('logintry', 'LoginController@logintry');

Route::get('admin/login', 'AdminController@index');
Route::post('admin/loginpost', 'AdminController@loginpost');

Route::get('/', function () {
    return view('welcome');
});

Route::get('roombook', ['middleware' => 'auth', 'uses' => 'RoomBookController@gotoroombook']);
Route::post('roombook/cap', 'RoomBookController@getroomswithcap');
Route::get('roombookcancel', ['middleware' => 'auth', 'uses' => 'RoomBookController@gotoroomcancel']);
Route::post('roombook_action', 'RoomBookController@store');
Route::post('roombookcancel_action', 'RoomBookController@roomcancel');
Route::get('prevbookings', ['middleware' => 'auth', 'uses' => 'HomeController@getPrevBookedRooms']);

Route::get('addroom', ['middleware' => 'auth', 'uses' => 'RoomInfoController@addroom']);
Route::post('roomaddaction', 'RoomInfoController@addroomaction');
Route::get('viewroom', ['middleware' => 'auth', 'uses' => 'RoomInfoController@viewroom']);
Route::get('confirmusers', ['middleware' => 'auth', 'uses' => 'HomeController@viewNewUsers']);
Route::post('authorizeuser', ['middleware' => 'auth', 'uses' => 'HomeController@authorizeUser']);
Route::get('viewusers', ['middleware' => 'auth', 'uses' => 'HomeController@viewCurrUsers']);


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('home', ['middleware' => 'auth', 'uses' => 'HomeController@gotohome']);

Route::get('bookedrooms', ['middleware' => 'auth', 'uses' => 'HomeController@getbookedRooms']);

Route::get('awaitingconfirmation', ['middleware' => 'auth', 'uses' => 'HomeController@awaitingconf']);


Route::get('hey','HeyController@index');