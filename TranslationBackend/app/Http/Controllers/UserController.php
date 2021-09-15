<?php

namespace App\Http\Controllers;
use App\User;

// need this to hash password
// remove this after we have the sign-up endpoint
// use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function verifyUsers(){
        $username = request()->username;
        $password = request()->password;

        // store hashed password in the password
        // remove this after we have the sign-up endpoint
        // $HashedPassword = Hash::make($password)
        // DB::update('update users set password = :psd', ['psd' => $HashedPassword]);

        $user = new User();
        $result = $user->userValidate($username, $password);

        return json_encode(['verified' => $result]);

    }

}
