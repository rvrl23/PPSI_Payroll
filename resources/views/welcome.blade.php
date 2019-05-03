<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

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
                color: black;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .links{
                margin-top: -5%;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            img{
                width: 80%;
                height: 20%;
            }
            .logo-animate{
                animation: logoanimate 0.8s ease-out;
            }

            @keyframes logoanimate{
                0%{transform: scale(0)}
                100%{transform: scale(1)}
            }

            .links-animate{
                transform: translateY(-60px);
            }


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">{{-- 
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            <div class="content">
                <div class="title m-b-md">
                    <img src="../img/PPSI LOGO Payroll.png" alt="PPSI LOGO" class="logo-animate  normal-pic">
                </div>

                <div class="links links-animate">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                    <a href="{{ route('register') }}">REGISTER</a>
                </div>
            </div>
        </div>
    </body>
</html>
