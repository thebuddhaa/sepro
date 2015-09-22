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
    	'name'     => 'Abhay',
        'username' => 'Abhay',
        'email'    => 'gajaby07@gmail.com',
        'password' => Hash::make('mypass'),
    ));
  }
}