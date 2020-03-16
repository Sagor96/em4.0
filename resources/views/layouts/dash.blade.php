<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Em | | @yield('title')</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('frontends/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- Ajax core -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Custom fonts for this template -->
  <link href="{{asset('frontends/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{asset('frontends/css/clean-blog.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontends/css/agency.min.css')}}" rel="stylesheet">
  
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
         <a class="navbar-brand js-scroll-trigger" href="/home">EventMir</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><h6 style="color: orange ">{{ Auth::user()->name }}</h6></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="{{ asset('backend/dist/img/client.png') }}" class="img-circle" alt="User Image">
    
                    <p>
                      <small>Admin since {{ Auth::user()->created_at->format('F d, Y') }}</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <!-- <a href="#" class="btn btn-default btn-flat">Edit Profile</a> -->
                    </div>
                    <div class="pull-right">
                      <a class="dropdown-item btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                  </li>
                </ul>
              </li>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{route('events.index')}}">Event</a>
            </li>
      @can('isAdmin')
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{route('users.index')}}">Admin</a>
            </li>
      @endcan

          </ul>
        </div>
      </div>
    </nav>
<header class="masthead" style="background-image: url({{asset('frontends/img/em_7.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1 >@yield('header')</h1>
            <span class="subheading"></span>
          </div>
        </div>
      </div>
    </div>
  </header>
 <ul class="nav justify-content-end nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link" href="{{route('events.index')}}">Event</a>
    </li>
    <li class="nav-item dropdown view">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Service
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Food</a>
                <a class="dropdown-item" href="#">Decoration</a>
                <a class="dropdown-item" href="#">Entertainment</a>
                <a class="dropdown-item" href="#">Transport</a>
                <a class="dropdown-item" href="{{route('venues.index')}}">Venue</a>
              </div>
            </li>

    <li class="nav-item">
      <a class="nav-link" href="#">List</a>
    </li>
  </ul>
 


  <!-- Main Content -->
  <div class="container h-300 d-inline-block">
    @yield('main-content')
  </div>

  <hr>
<!-- /Main Content -->

@section('footer')
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <p class="copyright text-muted">Copyright &copy; A. Alam Website 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('frontends/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('frontends/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('frontends/js/clean-blog.min.js')}}"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
@show
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

</script>
</body>

</html>
