<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('PetHotel', 'Admin PetHotel.com') }}</title>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('PetHotel', 'Admin PetHotel.com') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            @auth('admin')
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    Pet Hotel Master<span class="caret"></span>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('admin2/pethotel') }}">
                                        Data PetHotel
                                    </a>
                                    <a class="dropdown-item" href="{{ url('admin2/type') }}">
                                        Data Type
                                    </a>
                                     <a class="dropdown-item" href="{{ url('admin2/kandang') }}">
                                        Data Kandang
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    Member <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('admin2/member') }}">
                                     Daftar Member
                                    </a>
                                </div>
                            </li>
                             <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    Data Admin <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('admin2/admin/daftar') }}">
                                        Registrasi Admin
                                    </a>
                                     <a class="dropdown-item" href="{{ url('admin2/admin') }}">
                                        Daftar Admin
                                    </a>
                                </div>
                             
                            </li>
                            <li><a class="nav-link" href="{{ url('admin2/booking') }}">Data Booking</a></li>
                            @endauth
                        </ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                @if(Session::has('pesan'))
                <div class="alert alert-info alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ Session::get('pesan') }}
                </div>
                @endif

                @yield('content')
            </main>
        </div>
    </body>
</html>