<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function verifyUsers(){

        $username = request()->username;
        $password = request()->password;

        $user = new User();
        $result = $user->userValidate($username, $password);

        return json_encode(['verified' => $result]);

    }

    public function create(array $data)
    {
      return [
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ];
    }    

}
