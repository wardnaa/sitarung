@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Sistem Informasi Tata Ruang') }}</div>
                <div class="card-body m-0 p-0">
                    <div id="map" style="height: 700px"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var map = L.map('map').setView([-8.409518, 115.188919], 10);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([-8.409518, 115.188919]).addTo(map)
        .bindPopup('Bali<br>Island of the Gods')
        .openPopup();

</script>
@endsection
