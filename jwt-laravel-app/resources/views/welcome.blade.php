<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
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
            @endif

            <div class="content" style="padding:100px;">
               
                <div class="title m-b-md">
                    Laravel 6 <br> JWT Authentication
                </div>
                <center><h3>Register Form<br> (Postman POST-API) http://127.0.0.1:8000/api/register</h3></center>
                <form action="{{url('api/register')}}" method="post">
                    <input type="text" class="form-control" name="name" placeholder="Name"><br><br>
                    <input type="text" class="form-control" name="email" placeholder="Email"><br><br>
                    <input type="text" class="form-control" name="password" placeholder="Password"><br><br>
                    <input type="submit" class="btn btn-success" value="Register">
                </form>
             <center><h3>Login Form<br> (Postman POST-API) http://127.0.0.1:8000/api/login</h3></center>
                <form action="{{url('api/login')}}" method="post">
                    <input type="text" class="form-control" name="email" placeholder="Email"><br><br>
                    <input type="text" class="form-control" name="password" placeholder="Password"><br><br>
                    <input type="submit" class="btn btn-success" value="Login">
                </form>

                {{-- <center><h3>Task<br> (Postman POST-API) http://127.0.0.1:8000/api/task</h3></center>
                <form action="{{url('api/tasks')}}" method="post">
                    <input type="text" class="form-control" name="title" placeholder="Title"><br><br>
                    <input type="text" class="form-control" name="description" placeholder="Description"><br><br>
                    <input type="submit" class="btn btn-success" value="Task Add">
                </form>
               
                <center><a href="{{url('api/logout')}}">Logout</a><br> <h3>(Postman POST-API) http://127.0.0.1:8000/api/logout</h3></center>
               --}}

                {{-- <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> --}}
            </div>
        </div>
    </body>
</html>
