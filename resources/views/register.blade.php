@extends('layouts.layout')

@section('title')
Sign Up
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>Sign Up</h3>
                <form action="{{ url('signup') }}" method="post">
                    <div class="form-group">
                        <label for="email">Your E-Mail</label>
                        <input class="form-control" value="{{ Request::old('email') }}" type="text" name="email" id="email"/>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Your Username</label>
                        <input class="form-control" value="{{ Request::old('username')}}" type="text" name="username" id="first_name"/>
                    </div>

                    <div class="form-group">
                        <label for="Password">Your Password</label>
                        <input class="form-control" value="{{ Request::old('password')}}" type="password" name="password" id="password"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <input type="hidden" name="_token" value="{{ Session::token()}}"/>
                </form>
            </div>
    </div>
@endsection