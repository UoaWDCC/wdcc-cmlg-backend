<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


// class User extends Model implements Authenticatable
class User extends Model
{
    use Notifiable;

    public function userValidate($username, $password) {

        // $dbPassword = DB::table('users')
        //     ->where('name', $username)
        //     ->get()
        //     ->value('password');

        $dbPassword = DB::table('users')
        ->where('name', $username)->get()->pluck('password');

        $dbPassword=substr($dbPassword, 0, -2);
        $dbPassword=substr($dbPassword, 2);

        if($dbPassword == $password){
            return true;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
