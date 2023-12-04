<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    
</head>
<body>
  <div class="container">
    <ul class="header-links pull-left">
    
    </ul>
    <ul class="header-links pull-right">
    
      @if (Route::has('login'))
      @auth
    <li><a href="{{ url('/dashboard') }}">logout</a></li>
      @else
      <li><a href="{{route('login')}}"><i class="fa fa-user-o"></i> Login</a></li>
      <li><a href="{{route('register')}}"><i class="fa fa-user-o"></i> Register</a></li>
      @endauth
      @endif
      
    </ul>
  </div>
  </div>
    @yield('content')
</div>
   
</body>
</html>