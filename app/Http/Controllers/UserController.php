<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


use App\Http\Requests;

class UserController extends Controller
{

    public function getDashboard()
    {
        $cookie = cookie('saw-dashboard', true, 15);

        return view('dashboard')->withCookie($cookie);

    }

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

        return redirect()->route('dashboard');



    }


    public function postSignin(Request $request)
    {
        $remember = $request->input('remember_me');

        if(Auth::attempt(['email'=> $request['email'], 'password' => $request['password']], $remember )){
            return redirect()->route('dashboard');
        }

        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
