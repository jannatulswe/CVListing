<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Smart Recruitment System</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/front-end')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{asset('/front-end')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='{{asset('/front-end')}}/https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='{{asset('/front-end')}}/https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{asset('/front-end')}}/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/">SRS.com</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <div class="nav-item dropdown show">
                        <a class="nav-link dropdown-toggle bg-transparent border-0 text-white font-weight-bold" style="font-size: 14px;" type="button" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            My jobs
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach(\App\Category::all() as $category)
                                <a class="dropdown-item" href="{{ route('show.category', ['category' => $category->id]) }}">{{ $category->cat_name }}</a>
                            @endforeach

                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle bg-transparent border-0 text-white font-weight-bold" style="font-size: 14px;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            My Profile
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{route('user.create-cv')}}">Create Cv</a>
                            <a class="dropdown-item" href="{{ route('cv.profile') }}">Check CV</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>
                <li class="nav-item d-flex">
                    @if(\Illuminate\Support\Facades\Auth::user() === null)
                        <a class="nav-link mx-2 border-1" href="{{ route('login') }}">Login</a>
                        <a class="nav-link border-1" href="{{ route('register') }}">Register</a>
                    @else
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-th-large"></i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif

                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="masthead" style="background-image: url('{{asset('/front-end')}}/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h2>SMART RECRUITMENT SYSTEM</h2>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
@yield('main-body')

<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
{{--                        <a href="https://github.com/joypal23jkp">--}}
                        <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted"></p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('/front-end')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('/front-end')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="{{asset('/front-end')}}/js/clean-blog.min.js"></script>

</body>

</html>

