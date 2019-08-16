<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

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

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        #outer {
            width: 100%;
            display: block;
            text-align: center;
            position: relative;
            overflow: hidden;
            min-height: 100vh;
        }

        .home-top-video:before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            z-index: 1;
            background: linear-gradient(
                to right,
                rgba(0, 0, 0, 0.4),
                rgba(255, 255, 0, 0.1)
            );
        }

        .home-top-video {
            left: 0;
            top: 0;
            height: 100vh;
            width: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .home-text {
            position: absolute;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            color: #fff;
            z-index: 10;
        }

        .home-logo {
            left: 50%;
            top: 50%;
        }

        .home-close {
            position: absolute;
            left: 97%;
            top: 5%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            color: #fff;
            z-index: 1;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links home-text">
        @auth
        <a href="{{ url('/home') }}" style="color: white">Home</a>
        @else
        <a href="{{ route('login') }}" style="color: white">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" style="color: white">Register</a>
        @endif
        @endauth
    </div>
    @endif

    <div class="content" id="outer">
        <div class="home-top-video">
            <video autoplay loop muted width="100%">
                <source src="https://okutara.s3-ap-northeast-1.amazonaws.com/Okutara_main2.mp4" type="video/mp4"/>
            </video>
            <div class="home-text home-logo">
                <img src="https://okutara.s3-ap-northeast-1.amazonaws.com/logo1_white.png"/>
                <br/>
                <a href="" style="z-index: 100; position: absolute; color:white">
                    <i class="fas fa-play"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin: 0 30px">
    @foreach ($posts as $data)
    <div class="px-5 mt-3 justify-content-center">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-primary">{{ $data->title }}</h4>
                <p>{{ $data->created_at }}</p>
                <p class="card-text">{{ $data->description }}</p>
                <footer class="blockquote-footer text-right"><cite>{{ $data->user->first_name }} {{ $data->user->last_name }}</cite></footer>
            </div>
        </div>
    </div>
    @endforeach
</div>
</body>
</html>
