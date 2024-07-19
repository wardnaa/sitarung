@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
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

<div class="modal fade" id="featureModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title text-primary" id="feature-title"></h4>
        </div>
        <div class="modal-body" id="feature-info"></div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
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

<script type="text/javascript">
    var map = L.map('map').setView([-8.398190, 115.188038], 10);
    var highlight = L.geoJson(null);
    var highlightStyle = {
        stroke: false,
        fillColor: "#00FFFF",
        fillOpacity: 0.7,
        radius: 10
    };

    const provider = new GeoSearch.OpenStreetMapProvider({
        params: {
            countrycodes: 'id',
            'accept-language': 'id, en',
            addressdetails: 1
        }
    });

    const cariTempatContainer = document.getElementById('cari_tempat');
    const searchResultContainer = document.getElementById('search_result');
    const searchIcon = document.getElementById('search_icon');

    searchIcon.addEventListener('click', function() {
        console.log(searchIcon.innerHTML);
        if (searchIcon.innerHTML == 'close') {
            removeMarker();
            searchResultContainer.innerHTML = '';
            cariTempatContainer.value = '';
            searchIcon.innerHTML = 'search';
        }
    });

    cariTempatContainer.addEventListener('input', function(e) {
        document.getElementById('search_icon').innerHTML = "close"
        searchResultContainer.innerHTML = '';
        provider.search({ query: e.target.value })
            .then(function(results) {
                console.log(results);
                for (const result of results) {
                    const div = document.createElement('div');
                    div.classList.add('result_search');
                    div.innerHTML = result.label;
                    div.addEventListener('click', function() {
                        map.setView([result.y, result.x], 18);
                        setMarker(result.y, result.x, result.label);
                        searchResultContainer.innerHTML = '';
                        cariTempatContainer.value = result.label;
                    });
                    searchResultContainer.appendChild(div);
                }
                // searchResultContainer.innerHTML = '<div class="result_search">Swa, Yedashe Township, Taungoo District, East Bago Region, Bago Region, Myanmar</div>';
            });
    });

    function setMarker(lat, lng, name) {
        document.getElementById('search_icon').innerHTML = "close";
        L.marker([lat, lng]).addTo(map)
            .bindPopup(name)
            .openPopup();
    }

    function removeMarker() {
        map.eachLayer(function(layer) {
            if (layer instanceof L.Marker) {
                map.removeLayer(layer);
            }
        });
    }

    // cariTempatContainer.value = 'Masukkan alamat';

    // cariTempatContainer.addEeventListener('click', function() {
    //     console.log('cari tempat');
    // });

    // // Create GeoSearchControl without attaching it to the map yet
    // const searchControl = new GeoSearch.GeoSearchControl({
    //     provider: provider,
    //     style: 'bar',
    //     showPopup: true,
    //     searchLabel: 'Masukkan alamat'
    // });
    // cariTempatContainer.append(searchControl.onAdd(map));


    openstreetmap();
    function openstreetmap() {
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">'
                + 'OpenStreetMap</a> contributors'
        }).addTo(map);
    }

    function bingmap(){
        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
        }).addTo(map);
    }

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

    // L.marker([-8.409518, 115.188919]).addTo(map)
    //     .bindPopup('Bali<br>Island of the Gods')
    //     .openPopup();

    // geojson garis batas kecamatan
</script>
@include('layouts.business')

<script>
    const kabupaten = $('#kabupaten');
    const mapOption = $('input[name="inlineRadioOptions"]');
    const perairan = $('input[id="perairan"]');
    const daratan = $('input[id="daratan"]');
    const allKabupaten = $("#kabupaten")

    daratan.change(function () {
        const ischecked = $(this).is(':checked');

        if (ischecked) {
            for (let i = 0; i < allKabupaten[0].length; i++) {
                const kabupatenValue = allKabupaten[0][i].value;
                if (kabupatenValue != 'Pilih Kabupaten') {
                    getKabupatenPolaRuang(kabupatenValue);
                }
            }
        } else {
            clearLayer('rpr');
        }
    })

    function uncheckDaratan() {
        const daratan = $('input[id="daratan"]');
        daratan.prop('checked', false);
    }

    perairan.change(function () {
        const ischecked = $(this).is(':checked');
        if (ischecked) {
            loadJsonPolaRuang('perairan.geojson');
        } else {
            clearLayer('rpr_air');
        }
    })

    mapOption.change(function() {
        const value = $(this).val();
        if (value == 'option1') {
            openstreetmap();
        } else {
            bingmap();
        }
    });
    kabupaten.change(function() {
        const id = $(this).val();
        uncheckDaratan();
        clearLayer();
        clearLayer('rpr');
        loadPola();
    });
</script>

<script>
    const pola = document.querySelectorAll('#polaruang');
    pola.forEach(function(item) {
        item.addEventListener('click', function() {
            const id = item.value;
            const kabupatenValue = $('#kabupaten').val();
            switch (id) {
                case '1':
                    if (kabupatenValue == 'Pilih Kabupaten' && item.checked) {
                        alert('Pilih Kabupaten terlebih dahulu');
                        item.checked = false;
                        return;
                    }
                    item.checked ? getKabupatenPolaRuang(kabupatenValue) : clearLayer('rpr');
                    break;
                case '2':
                    if (kabupatenValue == 'Pilih Kabupaten' && item.checked) {
                        alert('Pilih Kabupaten terlebih dahulu');
                        item.checked = false;
                        return;
                    }
                    item.checked ? getKabupaten(kabupatenValue) : clearLayer();
                    break;
                case '4':
                    item.checked ? loadJsonKkop('kkop.geojson') : clearLayer('kkop');
                    break;
                case '5':
                    item.checked ? loadJsonKp2b('kp2b.geojson') : clearLayer('kp2b');
                    break;
                case '6':
                    item.checked ? loadJsonKrb('krb.geojson') : clearLayer('krb');
                    break;
                case '7':
                    item.checked ? loadJsonCagarBudaya('cagbud.geojson') : clearLayer('cagbud');
                    break;
                case '8':
                    item.checked ? loadJsonResapanAir('resair.geojson') : clearLayer('resair');
                    break;
                case '9':
                    item.checked ? loadJsonSempadan('ksmpdn.geojson') : clearLayer('ksmpdn');
                    break;
                case '10':
                    item.checked ? loadJsonHankam('hankam.geojson') : clearLayer('hankam');
                    break;
                case '11':
                    item.checked ? loadJsonKarst('kkarst.geojson') : clearLayer('kkarst');
                    break;
                case '12':
                    item.checked ? loadJsonPertambangan('ptbgmb.geojson') : clearLayer('ptbgmb');
                    break;
                case '13':
                    item.checked ? loadJsonMigrasiSatwa('mgrsat.geojson') : clearLayer('mgrsat');
                    break;
                case '14':
                    item.checked ? loadJsonDklp('dlkpel.geojson') : clearLayer('dlkpel');
                    break;
                case '15':
                    item.checked ? loadJsonPemukiman('pusat_permukiman.geojson') : clearLayer('pusat_permukiman');
                    break;
                case '17':
                    item.checked ? loadJsonJaringanTransportasi('transport_ln.geojson') : clearLayer('transport_ln');
                    break;
                case '18':
                    item.checked ? loadJsonJaringanTerminal('transport_pt.geojson') : clearLayer('transport_pt');
                    break;
                case '20':
                    item.checked ? loadJsonJaringanEnergi('energi_ln.geojson') : clearLayer('energi_ln');
                    break;
                case '21':
                    item.checked ? loadJsonInfraEnergi('energi_pt.geojson') : clearLayer('energi_pt');
                    break;
                case '23':
                    item.checked ? loadJsonJaringanTetap('telkom_ln.geojson') : clearLayer('telkom_ln');
                    break;
                case '24':
                    item.checked ? loadJsonInfraTetap('telkom_pt.geojson') : clearLayer('telkom_pt');
                    break;
                case '26':
                    item.checked ? loadJsonSumberDayaAir('sda_ln.geojson') : clearLayer('sda_ln');
                    break;
                case '27':
                    item.checked ? loadJsonSumberDayaAir('sda_pt.geojson') : clearLayer('sda_pt');
                    break;
                case '29':
                    item.checked ? loadJsonJaringanPrasarana('lainnya_ln.geojson') : clearLayer('lainnya_ln');
                    break;
                case '30':
                    item.checked ? loadJsonInfraPrasarana('lainnya_pt.geojson') : clearLayer('lainnya_pt');
                default:
                    break;
            }
        });
    });

    function loadPola() {
        const kabupatenValue = $('#kabupaten').val();
        const pola = document.querySelectorAll('#polaruang');
        pola.forEach(function(item) {
            const id = item.value;
            switch (id) {
                case '1':
                    if (kabupatenValue == 'Pilih Kabupaten' && item.checked) {
                        alert('Pilih Kabupaten terlebih dahulu');
                        item.checked = false;
                        return;
                    }
                    item.checked ? getKabupatenPolaRuang(kabupatenValue) : clearLayer('rpr');
                    break;
                case '2':
                    if (kabupatenValue == 'Pilih Kabupaten' && item.checked) {
                        alert('Pilih Kabupaten terlebih dahulu');
                        item.checked = false;
                        return;
                    }
                    item.checked ? getKabupaten(kabupatenValue) : clearLayer();
                    break;
            }
        });
    }
</script>
@endsection
