<!DOCTYPE html>

<html>

<head>

    <title>Laravel</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</head>

<body>



<nav class="navbar border navbar-expand-lg navbar-light navbar-laravel">

    <div class="container">

        <a class="navbar-brand" href="{{url('/')}}">Laravel</a>




        <div class="collapse justify-content-end  navbar-collapse" >

            <ul class="navbar-nav ">

                @guest

                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('login') }}">Login</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('register') }}">Register</a>

                    </li>

                @else

                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>

                    </li>

                @endguest

            </ul>



        </div>

    </div>

</nav>
<span class="border-bottom"></span>



@yield('content')



</body>

</html>
