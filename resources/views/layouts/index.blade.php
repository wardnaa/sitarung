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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.6.1/dist/geosearch.css">
    <script src="https://unpkg.com/leaflet-geosearch@3.6.1/dist/geosearch.umd.js"></script>

    <link href="https://ljagis.github.io/leaflet-measure/leaflet-measure.css" rel="stylesheet">
    <script src="https://ljagis.github.io/leaflet-measure/leaflet-measure.js"></script>

    <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.css">
    <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.Default.css">
    <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css">

    <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/leaflet.markercluster.js"></script>
    <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>



    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script> --}}

    <style>
        #map {
            min-height: 500px;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-pemprov-bali.png') }}">
</head>

<body>
    <div id="app">
        <div class="bg-third text-white" style="padding:0; height:5px">&nbsp;</div>
        {{-- <div class="bg-warning text-white" style="padding:0; height:5px">&nbsp;</div> --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-grey shadow-sm">
            <div class="container pt-1 pb-1">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="d-flex align-items-stretch">
                        <div class="span2">
                            <img src="{{ asset('images/logo-pemprov-bali.png') }}" alt="{{ config('app.name', 'Laravel') }}" height="60">
                            {{-- {{ config('app.name', 'Laravel') }} --}}
                        </div>
                        <div class="span10 align-self-center" style="margin-left: 10px; font-size:15px; max-width:200px;">
                            <p class="m-0 p-0" style="line-height: 1.2"><strong>Dinas Pekerjaan Umum, Penataan Ruang,</strong></p>
                            <p class="m-0 p-0" style="line-height: 1.2">Perumahan dan Kawasan Permukiman</p>
                            <p class="m-0 p-0" style="line-height: 1.2">Provinsi Bali</p>
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
                        <li class="nav-item p-lg-1">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}" style="margin: 3px !important">{{ __('BERANDA') }}</a>
                        </li>
                        {{-- <li class="nav-item separator d-none d-lg-block"></li> --}}
                        <li class="nav-item p-lg-1">
                            <a class="nav-link {{ Request::is('selayang-pandang') ? 'active' : '' }}" href="{{ url('selayang-pandang') }}" style="margin: 3px !important">{{ __('SELAYANG PANDANG') }}</a>
                        </li>
                        {{-- <li class="nav-item separator d-none d-lg-block"></li> --}}
                        {{-- <li class="nav-item p-lg-1">
                            <a class="nav-link {{ Request::is('panduan') ? 'active' : '' }}" href="{{ url('panduan') }}" style="margin: 3px !important">{{ __('PANDUAN') }}</a>
                        </li> --}}
                        {{-- <li class="nav-item separator d-none d-lg-block"></li> --}}
                        <li class="nav-item p-lg-1">
                            <a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="{{ url('kontak') }}" style="margin: 3px !important">{{ __('KONTAK KAMI') }}</a>
                        </li>
                        <li class="nav-item p-lg-1">
                            <a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="https://oss.go.id/" target="_blank" style="margin: 3px !important">{{ __('KKPR') }}</a>
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

        <main class="py-3">
            @yield('content')
        </main>

        <div class="bg-warning text-white" style="padding:0; height:5px">&nbsp;</div>
        <footer class="footer bg-secondary text-white">
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
                        <!-- <p>Alamat: <a class="text-warning" href="https://goo.gl/maps/edKHBSGJhwrnjN5Y6">Jl. Beliton No.2, Dauh Puri Kangin, Kec. Denpasar Bar., Kota Denpasar, Bali 80232</a></p> -->
                        <p class="m-0 p-0">No. Telp: (0361) 222883</p>
                        <p class="m-0 p-0">E-mail : <a class="text-warning" href="mailto:puprkim@baliprov.go.id" target="_blank" rel="noopener">puprkim@baliprov.go.id</a></p>
                        <p class="m-0 p-0">Facebook: <a class="text-warning" href="https://www.facebook.com/DinasPUPRKIMProvinsiBali">DinasPUPRKIMProvinsiBali</a></p>
                    </div>
                    <div class="col-md-4">
                        <p class="m-0 p-0"><strong>Kebijakan Privasi</strong></p>
                        <hr class="bg-white" />
                        <P><strong>Total Pengunjung :</strong> {{ $visitorCount }}</P>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>