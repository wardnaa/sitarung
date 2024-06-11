<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

     <!-- leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


    <style>
      #map { min-height: 500px; }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-pemprov-bali.png') }}">
</head>
<body>
    <div id="app">
        <div class="bg-primary text-white" style="padding:0; height:10px">&nbsp;</div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <div class="d-flex align-items-stretch">
                    <div class="span2">
                        <img src="{{ asset('images/logo-pemprov-bali.png') }}" alt="{{ config('app.name', 'Laravel') }}" height="60">
                        {{-- {{ config('app.name', 'Laravel') }} --}}
                    </div>
                    <div class="span10 align-self-center" style="margin-left: 10px">
                        <p class="m-0 p-0" style="line-height: 1.2">Pemerintah Provinsi Bali</p>
                        <p class="m-0 p-0" style="line-height: 1.2"><strong>Sistem Informasi Tata Ruang</strong></p>
                    </div>
                </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item p-lg-2">
                            <a class="nav-link" href="#">{{ __('Beranda') }}</a>
                        </li>
                        <li class="nav-item p-lg-2">
                            <a class="nav-link" href="#">{{ __('Selayang Pandang') }}</a>
                        </li>
                        <li class="nav-item p-lg-2">
                            <a class="nav-link" href="#">{{ __('Panduan') }}</a>
                        </li>
                        <li class="nav-item p-lg-2">
                            <a class="nav-link" href="#">{{ __('Kontak') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    {{-- <ul class="navbar-nav ms-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul> --}}
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer bg-primary text-white">
            <div class="container pt-4 pb-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="d-flex align-items-stretch">
                            <div class="span2">
                                <img src="{{ asset('images/logo-pemprov-bali.png') }}" alt="{{ config('app.name', 'Laravel') }}" height="60">
                                {{-- {{ config('app.name', 'Laravel') }} --}}
                            </div>
                            <div class="span10 align-self-center" style="margin-left: 10px">
                                <p class="m-0 p-0" style="line-height: 1.2">Pemerintah Provinsi Bali</p>
                                <p class="m-0 p-0" style="line-height: 1.2"><strong>Dinas Pekerjaan Umum Pemerintah Provinsi Bali</strong></p>
                            </div>
                        </div>
                        <br />
                        <p style="line-height: 1.2">Jl. Beliton No.2, Dauh Puri Kangin, Kec. Denpasar Bar., Kota Denpasar, Bali 80232</p>
                    </div>
                    <div class="col-md-4">
                        <p class="m-0 p-0"><strong>Kontak Kami</strong></p>
                    </div>
                    <div class="col-md-4">
                        <p class="m-0 p-0"><strong>Kebijakan Privasi</strong></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
