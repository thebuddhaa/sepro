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
            'eventtype' => 'ppt',
            'capacity' => '25',
            'status' => 'C',
            'starttime' => '2015-10-22 05:00:00',
            'endtime' => '2015-10-22 06:00:00'
        ));
        \App\RoomBook::create(array(
            'room_no' => 'sic-201',
            'user' => 'sanketark',
            'duration' => 'NULL',
            'purpose' => 'Walker ppt',
            'eventtype' => 'ppt',
            'capacity' => '30',
            'status' => 'C',
            'starttime' => '2015-10-25 05:20:00',
            'endtime' => '2015-10-25 06:10:00'
        ));
        \App\RoomBook::create(array(
            'room_no' => 'sic-301',
            'user' => 'abhay',
            'duration' => 'NULL',
            'purpose' => 'Lecture Series',
            'eventtype' => 'lecture',
            'capacity' => '50',
            'status' => 'C',
            'starttime' => '2015-11-11 05:20:00',
            'endtime' => '2015-11-12 06:10:00'
        ));
    }
}
