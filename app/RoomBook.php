<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class RoomBook extends Model
{
	protected $guarded = array();
	protected $table = 'roombook'; // table name
	//public $timestamps = false ; // to disable default timestamp fields

	protected $fillable = ['roomno' ,'user', 'purpose', 'starttime', 'endtime'];

	protected $dates = ['starttime', 'endtime'];

	// model function to store form data to database
	public static function saveFormData($data)
	{
//		return $data;
		DB::table('roombook')->insert($data);
	}

	public static function delbooking($data)
	{
		return DB::table('roombook')->where('user', $data['username'])
			->where('id',$data['id'])
			->delete();
	}

	public static function getBookingIDByUserID($username)
	{
		return DB::table('roombook')->where('user', $username)
			->lists('id','id');
	}
}
