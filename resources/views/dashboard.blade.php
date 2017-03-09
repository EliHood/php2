@extends('layouts.layout')

@section('title')
Dashboard
@endsection

@section('content')

    <div class="right-nav">



    </div>
    <div class="row">
        <div class=" right-content col-md-6 col-md-offset-3">
            <h2>Welcome Home</h2>
        </div>


        <section class="new-post">
            <div class="col-md-6 col-md-offset-3">
                <header><h4>What do you have to say?</h4></header>
                <form class="ajax" action="{{ route('post.create') }}" method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
            </div>
        </section>


        @foreach($posts as $post)
        <section class="posts">
            <div class="col-md-6 col-md-offset-3">
                <header><span class="twit-h"> <a href="{{ route('user.profile', strtolower($user->username)) }}">{{ $post->user->username }}</a>
                    <img src="/uploads/avatars/{{$post->user->avatar}}" alt="" id="pro2-img">
                    </span></header>
                    <article class="post">
                        <p class="post-bod">
                            {{ $post->body }}
                        </p>
                        <div class="info">
                           made on {{ date('F d, Y', strtotime($post->created_at)) }}
                        </div>
                    </article>

            </div>
        </section>
        @endforeach
    </div>
@endsection