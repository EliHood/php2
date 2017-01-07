@extends('layouts.layout')

@section('title')
    Members
@endsection

@section('content')

    <div class="right-nav">



    </div>
    <div class="row">
        <div class=" right-content col-md-6 col-md-offset-3">
            <h2>Members</h2>
            <div class="col-md-6 col-md-offset-0">
                @foreach($users as $user)
                   <div class="col-md-12" id="member-box">

                    <img src="/uploads/avatars/{{$user->avatar}}" alt="" id="pro2-img">
                    <h6><a href="/profile/{{$user->username}}">{{$user->username}}</a> </h6>
                   </div>

                @endforeach
            </div>
        </div>

    </div>
@endsection