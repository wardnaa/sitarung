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

<!-- modal example -->
<div class="modal fade" id="featureModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-primary" id="feature-title"></h4>
        </div>
        <div class="modal-body" id="feature-info"></div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    var map = L.map('map').setView([-8.398190, 115.188038], 10);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">'
            + 'OpenStreetMap</a> contributors'
    }).addTo(map);

    L.control.zoom({
        position: 'topright'
    }).addTo(map);

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

    const data = {}
    bataskec.addData(data);
    map.addLayer(bataskec);

</script>
@endsection
