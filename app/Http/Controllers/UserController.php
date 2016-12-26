<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{

    public function getWelcome()
    {
        return view('welcome');
    }

    public function userSignUp(Request $request)
    {

        $this->validate($request,[
            'email' => 'required|email|unique:users',
            'username' => 'required|max:120',
            'password' => 'required|min:4'

        ]);

        $email = $request['email'];
        $username = $request['username'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->username = $username;
        $user->password = $password;

        $user->save();

        return redirect()->route('welcome');



    }


    public function postSignin(Request $request)
    {
        $remember = $request->input('remember_me');

        if(Auth::attempt(['email'=> $request['email'], 'password' => $request['password']], $remember )){
            return redirect()->route('welcome');
        }

        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
