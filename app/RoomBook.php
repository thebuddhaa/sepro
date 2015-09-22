<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class RoomBook extends Model
{
    protected $guarded = array();
    protected $table = 'roombook'; // table name
    public $timestamps = false ; // to disable default timestamp fields

    // model function to store form data to database
    public static function saveFormData($data)
    {
        DB::table('roombook')->insert($data);
    }
}
