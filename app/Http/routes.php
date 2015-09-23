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

Route::get('roombook','RoomBookController@index');
Route::post('roombook_action','RoomBookController@store');
//Route::get('register', function(){
//return View::make('register');
//});

//Route::post('register_action', 'RegisterController@store');

// Route::get('registered', 'RegisterController@store');
//Route::post('register_action', 'AccountController@login');

//POST route
//Route::post('login', 'AccountController@login');


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('home', ['middleware' => 'auth', function(){
    return view('home');//->with('uname' => $uname);
}]);