// app/database/seeds/RoomBookTableSeeder.php
<?php

use Illuminate\Database\Seeder;

class RoomBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\RoomBook::create(array(
            'room_no' => 'sic-201',
            'user' => 'sanketark',
            'duration' => 'NULL',
            'purpose' => 'Seminar PPT',
            'status' => 'C',
            'starttime' => '2015-10-22 05:00:00',
            'endtime' => '2015-10-22 06:00:00'
        ));
        \App\RoomBook::create(array(
            'room_no' => 'sic-201',
            'user' => 'sanketark',
            'duration' => 'NULL',
            'purpose' => 'Walker ppt',
            'status' => 'W',
            'starttime' => '2015-10-22 05:20:00',
            'endtime' => '2015-10-22 06:10:00'
        ));
        \App\RoomBook::create(array(
            'room_no' => 'sic-301',
            'user' => 'abhay',
            'duration' => 'NULL',
            'purpose' => 'Walker ppt',
            'status' => 'C',
            'starttime' => '2015-10-23 05:20:00',
            'endtime' => '2015-10-23 06:10:00'
        ));
    }
}
