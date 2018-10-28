<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Bimbingan Konseling</title>

    <!-- Favicon-->
    <link href="{{ asset('images/logo.png') }}" rel="icon" type="image/png">    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- Custom Styles --}}
    <link rel="stylesheet" href="{{ asset('css/my.css') }}">    
</head>
<body>
    <!-- background -->
    <img class="mybg" src="{{ asset('images/bg.jpg') }}" alt="" style="z-index: -1;">
    <!-- end background -->    
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light navbar-laravel"> --}}
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel bg-dark bg-bk">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="media">
                        <img class="align-self-center mr-3" src="{{ asset('images/logo.png') }}" alt="Generic placeholder image" width="50px" height="50px">
                        <div class="media-body">
                            <h4 class="mt-0 mb-1 font-weight-bold">Bimbingan Konseling</h4>
                            <h6 class="mt-0 mb-0" style="letter-spacing: 2px">SMK NEGERI 1 MAJALAYA</h6>
                        </div>
                    </div>  
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li> --}}
                            {{-- <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li> --}}
                        @else
                            <li><a href="{{ url('/students') }}" class="nav-link {{ (starts_with(Route::currentRouteName(), 'students')) ? 'active':'' }}">Siswa</a></li>                        
                            <li><a href="{{ url('/services') }}" class="nav-link {{ (starts_with(Route::currentRouteName(), 'services')) ? 'active':'' }}">Layanan</a></li>                                                    
                            <li><a href="{{ url('/record') }}" class="nav-link {{ (starts_with(Route::currentRouteName(), 'record')) ? 'active':'' }}">Bimbingan</a></li>                                                                                
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
    </div>
</body>
</html>
