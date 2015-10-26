// app/database/seeds/RoomTableSeeder.php
<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RoomTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('room_info')->delete();

        \App\RoomInfo::create(array(
            'room_no' => 'sic-201',
            'location' => '2nd floor, C block',
            'room_type' => 'classroom',
            'capacity' => '40',
            'facility' => 'AC',
        ));
        \App\RoomInfo::create(array(
            'room_no' => 'sic-301',
            'location' => '3nd floor, C block',
            'room_type' => 'classroom',
            'capacity' => '40',
            'facility' => 'AC',
        ));
    }
}