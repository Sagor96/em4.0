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
  <link href="{{asset('frontends/css/clean-blog.css')}}" rel="stylesheet">
  <link href="{{asset('frontends/css/agency.min.css')}}" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
</head>

<body>
  
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/">EventMir</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/home">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('event') }}">Book Event</a>
        </li>
        <li class="nav-item dropdown view">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Booking Status
            @if(Cart::instance('default')->count()>0)
                <span class="badge badge-light">
                  {{Cart::instance('default')->count()}}
                </span>
                @endif
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('books.index')}}">Venue</a>
            <a class="dropdown-item" href="{{ route('cartequipments.index')}}">Equipments</a>
            <a class="dropdown-item" href="{{ route('cartlights.index')}}">Light</a>
            <a class="dropdown-item" href="{{ route('foods.index')}}">Food</a>
            <a class="dropdown-item" href="{{ route('cartflowers.index')}}">Flower</a>
            <a class="dropdown-item" href="{{ route('books.create')}}">Bookings Approvals</a>
            <a class="dropdown-item" href="{{route('books.index')}}">User Profiles</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
        @can('isAdmin')

        <li class="nav-item dropdown view">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Admin
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('venues.index')}}">Venue</a>
            <a class="dropdown-item" href="{{ route('equipments.index')}}">Equipments</a>
            <a class="dropdown-item" href="{{ route('lights.index')}}">Light</a>
            <a class="dropdown-item" href="{{ route('foods.index')}}">Food</a>
            <a class="dropdown-item" href="{{ route('flowers.index')}}">Flower</a>
            <a class="dropdown-item" href="{{ route('services.index')}}">Bookings Approvals</a>
            <a class="dropdown-item" href="{{url('event-list')}}">User Profiles</a>
          </div>
        </li>
@endcan
        <!-- User Account Menu -->
              <li class="nav-item">
                  <div class="pull-right">
                      <a class=" btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
        </li>
        <li class="nav-link">
                <!-- Menu Toggle Button -->
                {{ Auth::user()->name }}
              </li>
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
        <p class="copyright text-muted">Copyright &copy;Spring: 2020 - Name: Md. Ashraful Alam | ID: 15203131</p>
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
