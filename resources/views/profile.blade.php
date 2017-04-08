@extends('layouts.layout')

@section('title')
    Profile
@endsection

@section('content')

    <div class="right-nav">



    </div>
    <div class="row">
        <div class=" right-content col-md-6 col-md-offset-3">
            <h2>{{$user->username}}</h2>
            <img src="/uploads/avatars/{{$user->avatar}}" alt="" id="pro-img">
            <form enctype="multipart/form-data" action="{{ route('update.ava') }}" method="POST">
                <label> Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>

    </div>
@endsection