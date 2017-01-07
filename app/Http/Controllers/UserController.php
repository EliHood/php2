<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Image;

use App\Http\Requests;

class UserController extends Controller
{

    public function getDashboard()
    {
        $cookie = cookie('saw-dashboard', true, 15);
        $user = new User();
        return view('dashboard', array('user'=> Auth::user()), compact('users'))->withCookie($cookie);

    }


    public function getWelcome()
    {
        $user = new User();
        if (Auth::user()){
            return redirect()->route('dashboard');
        }
        return view('welcome',  array('user'=> Auth::user()), compact('users') );
    }

    public function getUsers()
    {
        $users = User::all();
        return view('members', array('user'=> Auth::user()), compact('users'));
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

    public function profile()
    {
        $users = User::all();
        return view('profile', compact('users') );
    }

    public function getProfile($user)
    {
        $user = User::where('username','=', $user)->first();
        return view ('/profile')->withUser($user);
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

    public function update_avatar(Request $request)
    {
         if($request->hasFile('avatar')){
             $avatar = $request->file('avatar');
             $filename = time(). '.' . $avatar->getClientOriginalExtension();
             Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/'. $filename));

             $user = Auth::user();
             $user->avatar = $filename;
             $user->save();
         }

        return view('profile', array('user'=> Auth::user()));

    }
}
