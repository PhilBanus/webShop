<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('dist/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('dist/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">


	<script src="https://kit.fontawesome.com/9f6a54e71d.js" crossorigin="anonymous"></script>
	
	@toastr_css
@toastr_js
	
</head>
<body class="bg-dark">
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-lg navbar-light bg-white border-bottom border-primary sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand p-2" href="{{ url('/') }}">
					<img src="{{asset('img/Cart.png')}}" height="24" class="d-inline-block align-top">
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
						
                    </ul> 
					
					<!-- Middle Of Navbar -->
                    <ul class="navbar-nav mx-auto">
						@if(\Request::is('basket') == false)
						<li class="container">
  <a href="{{route('basket')}}" class="btn btn-xs btn-link">
    <i class="fad fa-3x fa-shopping-basket nav-link" style="color:#8286C5"></i>
  </a>
  <span class="badge badge-notify" style="font-size:10px;">
							@php 
	  	$qty = 0;
	  if(session('cart'))
 foreach(session('cart') as $cart){
     $qty += $cart['qty'];
}
	  
	  @endphp
	  {{$qty}}
							
							</span>
</li>
						@endif
						
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
						
						
						
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
									@if(Auth::user()->isAdmin())
									<a href="./admin/Products" class="dropdown-item">Admin</a>
									@endif

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

		
	@toastr_render
	
</body>
</html>

