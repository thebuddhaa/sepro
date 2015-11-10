<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class RoomInfo extends Model
{
    protected $guarded = array();
    protected $table = 'room_info'; // table name
    public $timestamps = false; // to disable default timestamp fields

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
        $lsofroomnos = DB::table('room_info')->lists('room_no', 'room_no');
        return $lsofroomnos;
    }

    public static function getRoomsGreaterThanCapacity($cap)
    {
        $mincap = RoomInfo::where('capacity', '>=', $cap)
            ->min('capacity');

//        dd($mincap);

        if(!$mincap)
            $lsofrooms = ["msg"=>"No rooms of this capacity available"];
        else
            $lsofrooms = RoomInfo::whereIn('capacity',[$mincap])
            ->lists('room_no');
        return $lsofrooms;
    }

    /**
     * A room can be booked many times
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roombookings()
    {
        return $this->hasMany('App\RoomBook');
    }
}
