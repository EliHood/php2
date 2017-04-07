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


Route::get('/dashboard',[
    'middleware' => 'auth',
    'uses' => 'PostController@getDashboard',
    'as' => 'dashboard'

]);


Route::post('/createpost',[

    'uses'=>'PostController@postCreatePost',
    'as' => 'post.create',
    'middleware' => 'auth'

]);

Route::get('/register', function(){
    return view('register');
});

Route::get('/{user}/profile', [
    'uses' =>'UserController@getProfile',
    'as' => 'user.profile',
    'middleware' => 'auth'
]);


Route::get('/profile', [
    'uses'=>'UserController@profile',
    'middleware'=> 'auth',
    'as'=> 'profile'

]);




Route::get('/members',[
    'middleware' => 'auth',
    'uses' => 'UserController@getUsers',
    'as' => 'members'

]);


Route::post('/profile', 'UserController@update_avatar');



Route::post('/signup',[

    'uses'=>'UserController@userSignUp',
    'as' => 'signup'

]);

Route::get('/', [
    'uses' => 'UserController@getWelcome',
    'as' => 'home'


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