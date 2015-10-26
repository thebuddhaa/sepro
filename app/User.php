<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

use Illuminate\Auth\Authenticatable;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{

	use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

//    protected $redirectPath = '/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username' ,'name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

	// protected $fillable = array('username', 'password');
    
    protected $guarded = array();
	// protected $table = 'users'; // table name
//	public $timestamps = false ; // to disable default timestamp fields

	// model function to store form data to database
	public static function saveFormData($data) {
	    DB::table('users')->insert($data);
	}

    public function isAdmin(){
        return role == "admin";
    }
}
