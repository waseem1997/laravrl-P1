
<!-- 
    this page will represent my main skeleton for HTML page 
    here i will link all my libraries for design and header and footer 

    @yeild: to specify where i want to put the enjected code 
-->
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('myStyle/main.css')}}">
    </head>
    <body> 

    <!-- navbar section -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Movies Reviews</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav  ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/posts') }}">Home<span class="sr-only">(current)</span></a>
      </li>
      @guest <!-- if the user is a guest show me login and register links -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/login') }}">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/register') }}">Register</a>
      </li>
      @else <!-- if the user is not a guest, so he logged in previously show me the logout link-->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">{{ Auth::user()->name }}</a> <!-- show the name of the user who logged in -->
      </li>
      @endguest <!-- end check statement -->
    </ul>
  </div>
</nav>

<!-- end navbar section -->
        @yield('content') <!-- specify the pace that the content will paste to -->
     

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> 
        <script src="{{asset('javaScript/main.js')}}"></script> 
    </body>
</html>