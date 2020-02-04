<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Play</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="assets2/images/favicon.png"/>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }


        .nav{
            padding: 10px;
            font-size: 17px;
        }

        .full-height {
            height: 20vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }


        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            text-align: center;
            padding: 16px 18px;
            text-decoration: none;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            <uL>
                @auth
                    <li><a class="nav" href="{{ url('/home') }}">Home</a></li>
                @else
                    <li><a class="nav" href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav" href="{{ route('register') }}">Register </a></li>
                @endauth
            </uL>

        </div>
    @endif


</div>
<div class="container">
    <div class="content">
        @yield('content')
    </div>
</div>
</body>
</html>
