<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class RoomInfo extends Model
{
	protected $guarded = array();
	protected $table = 'room_info'; // table name
	public $timestamps = false ; // to disable default timestamp fields

	// model function to store form data to database
	public static function saveFormData($data)
	{
		DB::table('room_info')->insert($data);
	}

	public static function getallRooms()
	{
		$lsofrooms = DB::table('room_info')->get();
		return $lsofrooms;
	}

	public static function getRoomNos()
	{
		$lsofroomnos = DB::table('room_info')->lists('room_no','room_no');
		return $lsofroomnos;
	}
}
