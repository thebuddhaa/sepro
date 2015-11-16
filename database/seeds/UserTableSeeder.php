// app/database/seeds/UserTableSeeder.php
<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('Users')->delete();

        \App\User::create(array(
            'name' => 'Abhay',
            'username' => 'Abhay',
            'email' => 'gajaby07@gmail.com',
            'role' => 'admin',
            'status' => 'A',
            'password' => Hash::make('mypass'),
        ));
/*        \App\User::create(array(
            'name'     => 'sanket',
            'username' => 'sanketark',
            'email'    => 'sanketark@iitb.ac.in',
            'role' => 'user',
            'status' => 'A',
            'password' => Hash::make('sanket'),
        ));*/
    }
}