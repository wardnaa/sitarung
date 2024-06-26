@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Sistem Informasi Tata Ruang') }}</div>
                <div class="card-body m-0 p-0">
                    <div id="map" style="height: 700px"></div>
                    @include('layouts.sidebar')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal Disclaimer -->
<div class="modal fade" id="disclaimer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="disclaimerLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="disclaimerLabel">{{ $disclaimer->judul }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {!! $disclaimer->konten !!}
        </div>
        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="setuju">Saya Setuju</button>
        </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var map = L.map('map').setView([-8.398190, 115.188038], 10);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">'
            + 'OpenStreetMap</a> contributors'
    }).addTo(map);

    // L.control.zoom({
    //     position: 'topright'
    // }).addTo(map);

    // custom zoom control
    const mapin = document.getElementById('mapin');
    const mapout = document.getElementById('mapout');

    mapin.addEventListener('click', function() {
        map.zoomIn();
    });

    mapout.addEventListener('click', function() {
        map.zoomOut();
    });

    // remove default zoom control
    map.zoomControl.remove();

    L.marker([-8.409518, 115.188919]).addTo(map)
        .bindPopup('Bali<br>Island of the Gods')
        .openPopup();

    // geojson garis batas kecamatan
    var bataskec = L.geoJson(null, {
        style: function (feature) {
            return {
            fillColor: "white", //Warna tengah polygon
            fillOpacity: 0,
            color: "black",
            weight: 1,
            opacity: 0.6,
            clickable: true
            };
        },
        onEachFeature: function (feature, layer) {
            if (feature.properties) {
            var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Kecamatan</th><td>" + feature.properties.KECAMATAN +"</td></tr>" + "<table>";
            layer.on({
                click: function (e) {
                $("#feature-title").html(feature.properties.KECAMATAN);
                $("#feature-info").html(content);
                $("#featureModal").modal("show");
                highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
                }
            });
            }
            layer.on({
            mouseover: function (e) {
                var layer = e.target;
                layer.setStyle({
                weight: 3,
                color: "#00FFFF",
                opacity: 1
                });
                if (!L.Browser.ie && !L.Browser.opera) {
                layer.bringToFront();
                }
            },
            mouseout: function (e) {
                bataskec.resetStyle(e.target);
            }
            });
        }
    });

    // const data = {}
    // bataskec.addData(data);
    // map.addLayer(bataskec);
    $(document).ready(function() {
        // setuju button, hide modal disclaimer and not show 1 day with cookie
        $('#setuju').click(function() {
            $('#disclaimer').modal('hide');
            document.cookie = "disclaimer=1; max-age=" + 60 * 60 * 24;
        });

        // show modal disclaimer if not show 1 day
        if (document.cookie.indexOf('disclaimer=1') == -1) {
            $('#disclaimer').modal('show');
        }
    });
</script>
@endsection
