<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    {!! Html::style( asset('css/main.css')) !!}
    {{--<link rel="stylesheet" href="{!! secure_asset('css/main.css') !!}">--}}
</head>
<body>
<div class="mycont">
<nav id="mynav" class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Eli Hood</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">


                @if(!Auth::check())
                    <li><a href="/">Home</a></li>
                    <li><a href="/login"> Login </a></li>
                    <li><a href="/register">Register</a></li>
                @endif


                @if(Auth::check())

                        <li><a href="{{ route('user.profile', strtolower($user->username)) }}">{{$user->username}}</a></li>
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>


                        <li><a href="{{ route('logout')}}">Logout</a></li>
                        <li><a href="{{ route('members') }}">Members</a></li>

                @endif

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>




        @yield('content')



<footer>

</footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    {!! Html::script( asset('js/main.js')) !!}

</div>
</body>
</html>
