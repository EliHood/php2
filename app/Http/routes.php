<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', function(){
    return view('register');
});



Route::post('/signup',[

    'uses'=>'UserController@userSignUp',
    'as' => 'signup'

]);

Route::get('/',[
    'uses' => 'UserController@getWelcome',
    'as' => 'welcome'

]);

Route::get('/login', function(){
    return view ('login');

});


Route::post('/signin',[

    'uses'=>'UserController@postSignin',
    'as' => 'signin'

]);

Route::get('/logout',[
    'uses' => 'UserController@getLogout',
    'as' => 'logout'


]);