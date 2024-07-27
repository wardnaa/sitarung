<script type="text/javascript">
    $(document).ready(function() {
        $('#kabupaten').change(function() {
            var kabupatenId = $(this).val();
            $('#kecamatan').empty();
            $.ajax({
                url: "{{ url('kecamatan') }}" + '/' + kabupatenId,
                type: 'GET',
                success: function(response) {
                    // console.log(response);
                    $('#kecamatan').append('<option selected>Pilih Kecamatan</option>');
                    $.each(response, function(key, value) {
                        // Non capital letter
                        $('#kecamatan').append('<option value="' + value.id + '">' + value.nama + '</option>');
                    });
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
<!-- <div id="element-on-top-right">
    <button class="btn btn-info btn-sm float-end text-white" style="display: flex" id="btnkoordinat">info koordinat
        <span class="material-symbols-outlined" style="font-size: 20px">location_on</span>
    </button>

    <div class="sidebar-right">
        <div style="background-color: #f4f5f9">Detail Administrasi</div>
        <hr>
        <b>Provinsi</b>
        <p>Bali</p>
        <b>Kecamatan</b>
        <p>Denpasar Utara</p>
        <b>Kelurahan</b>
        <p>Desa Mongal</p>
        <b>Nama Jalan</b>
        <p>Jalan Lebe Kader</p>
        <b>Kode Pos</b>
        <p>80238</p>
        <hr>
        <div class="nav-container">
            <nav class="nav" style="flex-wrap: nowrap">
                <a class="nav-link active" aria-current="page" href="#">Active</a>
                <a class="nav-link" href="#">Link</a>
                <a class="nav-link" href="#">Link</a>
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </nav>
        </div>
        <hr>
        <p>Exmple Data : </p>
    </div>
</div>
<div id="koordinat" style="background-color: #00bcd4" class="text-white">
    <div style="display: flex">
        <span class="material-symbols-outlined" style="font-size: 20px; margin-right: 10px">location_on</span>
        96.840200, 4.638319
        <span class="material-symbols-outlined" style="font-size: 20px; margin-left: 10px">content_copy</span>

        <span class="material-symbols-outlined" style="font-size: 20px; margin-left: 60px" id="btnclosekoordinat">close</span>
    </div>
</div> -->

<div class="icon-toggle-container">
    <span class="material-symbols-outlined sidebar_toggle floating-icon" id="collapsebtn">Menu</span>
    <span class="material-symbols-outlined sidebar_toggle floating-icon" id="mapin" style="margin-top: 40px">Add</span>
    <span class="material-symbols-outlined sidebar_toggle floating-icon" id="mapout" style="margin-top: 73px">remove</span>
    <span class="material-symbols-outlined sidebar_toggle floating-icon" style="margin-top: 110px" id="search_toggle">search</span>
    <div class="searchbar_sidebar_container" id="search_tempat_container" style="display: none;">
        <input type="text" class="searchbar_sidebar_input" id="cari_tempat" placeholder="Cari alamat atau tempat" aria-label="Recipient's username" aria-describedby="button-addon2">
        <span class="material-symbols-outlined sidebar_toggle" id="search_icon">search</span>
        <div style="margin-top: 3px;" id="search_result">
        </div>
    </div>
    <!-- <span class="material-symbols-outlined sidebar_toggle floating-icon" style="margin-top: 147px" id="location">near_me</span> -->
    <!-- <span class="material-symbols-outlined sidebar_toggle floating-icon" style="margin-top: 186px" id="measure">straighten</span> -->
    <span class="material-symbols-outlined sidebar_toggle floating-icon" style="margin-top: 147px" id="information_toggle">expand_content</span>
    <div class="information_container" style="display: none">
        <h3 style="font-size: 14px">Detail Legenda</h3>

        <div style="margin-left: 12px;">
            <b>Rencara Pola Ruang</b>
            <img src="img/rpr.png" width="260" id="legenda_rencana_pola_ruang">
            <br>
            <br>
            <b>Sistem Pusat Permukiman</b>
            <img src="img/permukiman.png" width="160" style="margin-left: 10px" id="legenda_sistem_pusat_permukiman">
            <br>
            <br>
            <b>Sistem Jaringan Transportasi</b>
            <img src="img/arteri.png" width="260" id="legenda_jaringan_transportasi">
            <br>
            <br>
            <b>Infrastruktur Transportasi</b>
            <img src="img/transport_pt.png" width="210" id="legenda_infrastruktur_transportasi">
            <br>
            <br>
            <b>Sistem Jaringan Energi</b>
            <img src="img/energi_ln.png" width="260" id="legenda_jaringan_energi">
            <br>
            <br>
            <b>Infrastruktur Energi</b>
            <img src="img/energi_pt.png" width="260" id="legenda_infrastruktur_energi">
            <br>
            <br>
            <b>Sistem Jaringan Telekomunikasi</b>
            <img src="img/sda_ln.png" width="200" id="legenda_jaringan_tetap">
            <br>
            <br>
            <b>Sistem Jaringan Sumber Daya Air</b>
            <img src="img/sda_pt.png" width="200" id="legenda_jaringan_sumber_daya_air">
            <br>
            <br>
            <b>Sistem Jaringan Prasarana Lainnya</b>
            <img src="img/lainnya_ln.png" width="230" id="legenda_infrastruktur_prasarana_lainnya">
            <br>
            <br>
            <img src="img/lainnya_pt.png" width="230" id="legenda_infrastruktur_prasarana_lainnya">
        </div>
    </div>
    <!-- icon toggle -->
</div>
<div id="element-on-top-left" class="scrollable">
    <div class="sidebar-left" style="background-color: white">
        <div class="card">
            <div class="card-header bg-primary text-light">{{ __('Basemap') }}</div>
            <div class="card-body">
                <ul class="list-group">
                    <label class="label-group">Pilih <b>Maps</b></label>
                    <li class="list-group-item">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="streetmap" value="option1" checked>
                            <label class="form-check-label" for="streetmap"><strong>Street Map</strong></label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="satelit" value="option2">
                            <label class="form-check-label" for="satelit"><strong>Bing Satelit</strong></label>
                        </div>
                    </li>
                </ul>
                <hr />
                <div class="form-group row">
                    <div class="col-5">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="daratan">
                            <label class="form-check-label" for="daratan"><strong>Daratan</strong></label>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="perairan" value="perairan">
                            <label class="form-check-label" for="perairan"><strong>Perairan</strong></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="label-group"><b>Opacity : </b></label>
                    <input class="form-range" id="opacity-global" type="range" class="form-range" min="0" max="1" step="0.1" value="1" />
                </div>
                {{-- <div class="form-group">
                    <label class="label-group">Pilih <b>Kabupaten/Kota</b></label>
                    <select class="form-select" aria-label="Default select example" id="kabupaten">
                        <option selected>Pilih Kabupaten</option>
                        @foreach ($kabupaten as $item)
                        <option value="{{ $item->id }}">{{ ucwords(strtolower($item->nama)) }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="batas-kecamatan" value="batas-kecamatan">
                    <label class="form-check-label" for="batas-kecamatan"><strong>Batas Kecamatan</strong></label>
                </div>
            </div>
        </div>
        <hr />
        <div class="card">
            <div class="card-header bg-third">{{ __('Rencana Struktur Ruang') }}</div>
            <div class="card-body p-2">
                <!-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" onclick="selectAll()">
                    <label class="form-check-label" for="defaultCheck1">
                        <strong>Pilih Semua Layer</strong>
                    </label>
                </div> -->
                <div class="list-group">
                    <!-- Get data polaruang with tree -->
                    @foreach ($struktur as $item)
                    <div class="list-group-item">
                        <!-- Check if header = 1 then hide checkbox -->
                        @if ($item->header == 1)
                        {{-- <div class="form-check"> --}}
                        {{-- <input class="form-check-input" type="checkbox" value="" id="{{ $item->id }}"> --}}
                        <label class="form-check-label" for="{{ $item->id }}">
                            <strong>{{ $item->nama }}</strong>
                        </label>
                        {{-- </div> --}}
                        @else
                        <div class="row">
                            <div class="col-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="polaruang" value="{{ $item->id }}">
                                    <label class="form-check-label" for="{{ $item->id }}">
                                        {{ $item->nama }}
                                    </label>
                                    <!-- Add arrow down in right -->
                                    {{-- <span class="material-symbols-outlined mt-1" style="font-size: 20px; float: right">expand_more</span> --}}
                                </div>
                            </div>
                            <div class="col-3 align-items-stretch">
                                <!-- badge -->
                                {{-- <span class="badge rounded-pill bg-primary mt-1" style="float: right">:::</span> --}}
                                <div class="btn-group" role="group" id="btnGroup">
                                    <a class="btn btn-outline-success btn-xs badge badge-pill collapsed text-dark" data-toggle="collapse" menu-name="opacity_{{ str_replace(' ', '_', strtolower($child->nama)) }}" href="#legend82" role="button" aria-expanded="false" aria-controls="legend82"><i class="fas fa-list fs-sm"></i></a><a class="btn btn-outline-success btn-xs badge badge-pill text-dark" data-html="true" role="button" data-container="body" data-toggle="popover" data-placement="bottom" data-original-title="" title=""><i class="fas fa-adjust fs-sm"></i></a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (count($item->children) > 0)
                        <div class="">
                            @foreach ($item->children as $child)
                            <div class="row">
                                <div class="col-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input me-1" type="checkbox" id="polaruang" value="{{ $child->id }}" id="{{ $child->id }}">
                                        <label class="form-check-label" for="{{ $child->id }}">{{ $child->nama }}</label>
                                        <input class="form-range" id="opacity_{{ str_replace(' ', '_', strtolower($child->nama)) }}" onchange="setAndSaveOpacity(`{{ str_replace(' ', '_', strtolower($child->nama)) }}`)" type="range" min="0" max="1" step="0.1" value="1" style="display: none" />
                                    </div>
                                </div>
                                <div class="col-3 align-items-stretch">
                                    <!-- badge -->
                                    {{-- <span class="badge rounded-pill bg-primary mt-1" style="float: right">:::</span> --}}
                                    <div class="btn-group" role="group" id="btnGroup">
                                        <a class="btn btn-outline-success btn-xs badge badge-pill collapsed text-dark" data-toggle="collapse" href="#legend82" menu-name="opacity_{{ str_replace(' ', '_', strtolower($child->nama)) }}" role="button" aria-expanded="false" aria-controls="legend82"><i class="fas fa-list fs-sm"></i></a>
                                        <a onclick="showOpacitySetting(`{{ str_replace(' ', '_', strtolower($child->nama)) }}`)" class="btn btn-outline-success btn-xs badge badge-pill text-dark" data-html="true" role="button" data-container="body" data-toggle="popover" data-placement="bottom" data-original-title="" title=""><i class="fas fa-adjust fs-sm"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr />
        <div class="card">
            <div class="card-header bg-primary text-light">{{ __('Rencana Pola Ruang') }}</div>
            <div class="card-body p-2">
                <!-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" onclick="selectAll()">
                    <label class="form-check-label" for="defaultCheck1">
                        <strong>Pilih Semua Layer</strong>
                    </label>
                </div> -->
                <div class="form-group">
                    <label class="label-group">Pilih <b>Kabupaten/Kota</b></label>
                    <select class="form-select" aria-label="Default select example" id="kabupaten">
                        <option selected>Pilih Kabupaten</option>
                        @foreach ($kabupaten as $item)
                        <option value="{{ $item->id }}">{{ ucwords(strtolower($item->nama)) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="list-group">
                    <!-- Get data polaruang with tree -->
                    @foreach ($polaruang as $item)
                    <div class="list-group-item">
                        <!-- Check if header = 1 then hide checkbox -->
                        @if ($item->header == 1)
                        {{-- <div class="form-check"> --}}
                        {{-- <input class="form-check-input" type="checkbox" value="" id="{{ $item->id }}"> --}}
                        <label class="form-check-label" for="{{ $item->id }}">
                            <strong>{{ $item->nama }}</strong>
                        </label>
                        {{-- </div> --}}
                        @else
                        <div class="row">
                            <div class="col-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="polaruang" value="{{ $item->id }}">
                                    <label class="form-check-label" for="{{ $item->id }}">
                                        {{ $item->nama }}
                                    </label>
                                    <input class="form-range" id="opacity_{{ str_replace(' ', '_', strtolower($item->nama)) }}" onchange="setAndSaveOpacity(`{{ str_replace(' ', '_', strtolower($item->nama)) }}`)" type="range" min="0" max="1" step="0.1" value="1" style="display: none" />
                                    <!-- Add arrow down in right -->
                                    {{-- <span class="material-symbols-outlined mt-1" style="font-size: 20px; float: right">expand_more</span> --}}
                                </div>
                            </div>
                            <div class="col-3 align-items-stretch">
                                <!-- badge -->
                                {{-- <span class="badge rounded-pill bg-primary mt-1" style="float: right">:::</span> --}}
                                <div class="btn-group" role="group" id="btnGroup">
                                    <a class="btn btn-outline-primary btn-xs badge badge-pill collapsed text-dark" data-toggle="collapse" menu-name="opacity_{{ str_replace(' ', '_', strtolower($item->nama)) }}" href="#legend82" role="button" aria-expanded="false" aria-controls="legend82"><i class="fas fa-list fs-sm"></i></a>
                                    <a onclick="showOpacitySetting(`{{ str_replace(' ', '_', strtolower($item->nama)) }}`)" class="btn btn-outline-success btn-xs badge badge-pill text-dark" data-html="true" role="button" data-container="body" data-toggle="popover" data-placement="bottom" data-original-title="" title=""><i class="fas fa-adjust fs-sm"></i></a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (count($item->children) > 0)
                        <div class="">
                            @foreach ($item->children as $child)
                            <div class="row">
                                <div class="col-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input me-1" type="checkbox" id="polaruang" value="{{ $child->id }}" id="{{ $child->id }}">
                                        <label class="form-check-label" for="{{ $child->id }}">{{ $child->nama }}</label>
                                        <input class="form-range" id="opacity_{{ str_replace(' ', '_', strtolower($child->nama)) }}" onchange="setAndSaveOpacity(`{{ str_replace(' ', '_', strtolower($child->nama)) }}`)" type="range" min="0" max="1" step="0.1" value="1" style="display: none" />
                                    </div>
                                </div>
                                <div class="col-3 align-items-stretch">
                                    <!-- badge -->
                                    {{-- <span class="badge rounded-pill bg-primary mt-1" style="float: right">:::</span> --}}
                                    <div class="btn-group" role="group" id="btnGroup">
                                        <a class="btn btn-outline-success btn-xs badge badge-pill collapsed text-dark" data-toggle="collapse" menu-name="opacity_{{ str_replace(' ', '_', strtolower($child->nama)) }}" href="#legend82" role="button" aria-expanded="false" aria-controls="legend82"><i class="fas fa-list fs-sm"></i></a>
                                        <a onclick="showOpacitySetting(`{{ str_replace(' ', '_', strtolower($child->nama)) }}`)" class="btn btn-outline-success btn-xs badge badge-pill text-dark" data-html="true" role="button" data-container="body" data-toggle="popover" data-placement="bottom" data-original-title="" title=""><i class="fas fa-adjust fs-sm"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr />
        <div class="card">
            <div class="card-header bg-warning">{{ __('Ketentuan Khusus') }}</div>
            <div class="card-body p-2">
                <!-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" onclick="selectAll()">
                    <label class="form-check-label" for="defaultCheck1">
                        <strong>Pilih Semua Layer</strong>
                    </label>
                </div> -->
                <div class="list-group">
                    <!-- Get data polaruang with tree -->
                    @foreach ($ketentuan as $item)
                    <div class="list-group-item">
                        <!-- Check if header = 1 then hide checkbox -->
                        @if ($item->header == 1)
                        {{-- <div class="form-check"> --}}
                        {{-- <input class="form-check-input" type="checkbox" value="" id="{{ $item->id }}"> --}}
                        <label class="form-check-label" for="{{ $item->id }}">
                            <strong>{{ $item->nama }}</strong>
                        </label>
                        {{-- </div> --}}
                        @else
                        <div class="row">
                            <div class="col-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="polaruang" value="{{ $item->id }}">
                                    <label class="form-check-label" for="{{ $item->id }}">
                                        {{ $item->nama }}
                                    </label>
                                    <!-- Add arrow down in right -->
                                    {{-- <span class="material-symbols-outlined mt-1" style="font-size: 20px; float: right">expand_more</span> --}}
                                </div>
                            </div>
                            <div class="col-3 align-items-stretch">
                                <!-- badge -->
                                {{-- <span class="badge rounded-pill bg-primary mt-1" style="float: right">:::</span> --}}
                                <div class="btn-group" role="group" id="btnGroup">
                                    <a class="btn btn-outline-success btn-xs badge badge-pill collapsed text-dark" data-toggle="collapse" href="#legend82" menu-name="opacity_{{ str_replace(' ', '_', strtolower($item->nama)) }}" role="button" aria-expanded="false" aria-controls="legend82"><i class="fas fa-list fs-sm"></i></a><a class="btn btn-outline-success btn-xs badge badge-pill text-dark" data-html="true" role="button" data-container="body" data-toggle="popover" data-placement="bottom" data-original-title="" title=""><i class="fas fa-adjust fs-sm"></i></a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if (count($item->children) > 0)
                        <div class="">
                            @foreach ($item->children as $child)
                            <div class="row">
                                <div class="col-9">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input me-1" type="checkbox" id="polaruang" value="{{ $child->id }}" id="{{ $child->id }}">
                                        <label class="form-check-label" for="{{ $child->id }}">{{ $child->nama }}</label>
                                        <input class="form-range" id="opacity_{{ str_replace(' ', '_', strtolower($child->nama)) }}" onchange="setAndSaveOpacity(`{{ str_replace(' ', '_', strtolower($child->nama)) }}`)" type="range" min="0" max="1" step="0.1" value="1" style="display: none" />
                                    </div>
                                </div>
                                <div class="col-3 align-items-stretch">
                                    <!-- badge -->
                                    {{-- <span class="badge rounded-pill bg-primary mt-1" style="float: right">:::</span> --}}
                                    <div class="btn-group" role="group" id="btnGroup">
                                        <a class="btn btn-outline-warning btn-xs badge badge-pill collapsed text-dark" data-toggle="collapse" href="#legend82" menu-name="opacity_{{ str_replace(' ', '_', strtolower($child->nama)) }}" role="button" aria-expanded="false" aria-controls="legend82"><i class="fas fa-list fs-sm"></i></a>
                                        <a onclick="showOpacitySetting(`{{ str_replace(' ', '_', strtolower($child->nama)) }}`)" class="btn btn-outline-success btn-xs badge badge-pill text-dark" data-html="true" role="button" data-container="body" data-toggle="popover" data-placement="bottom" data-original-title="" title=""><i class="fas fa-adjust fs-sm"></i></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    var elementOnTopLeft = document.getElementById('element-on-top-left');
    var elementOnTopRight = document.getElementById('element-on-top-right');
    var sidebarLeft = document.querySelector('.sidebar-left');
    var sidebarRight = document.querySelector('.sidebar-right');
    var collapsebtn = document.getElementById('collapsebtn');
    var floatingIcon = document.querySelectorAll('.floating-icon');
    var btnkoordinat = document.getElementById('btnkoordinat');
    var koordinatPanel = document.getElementById('koordinat');
    // var btnclosekoordinat = document.getElementById('btnclosekoordinat');
    var search_toggle = document.getElementById('search_toggle');
    var search_tempat = document.getElementById('search_tempat_container');
    var information_toggle = document.getElementById('information_toggle');
    var information_container = document.querySelector('.information_container');
    var icon_toogle_container = document.querySelector('.icon-toggle-container');
    var opacityGlobal = document.getElementById('opacity-global');
    localStorage.setItem('sidebarshow', 'false');

    opacityGlobal.addEventListener('change', function(e) {
        let opacity = e.target.value;
        if (e.target.value > 0.8) {
            opacity = 0.8;
        }
        for (let i = 1; i <= 9; i++) {

            if (window[`layer_rencana_pola_ruang_${i}`]) {
                window[`layer_rencana_pola_ruang_${i}`].setStyle({
                    fillOpacity: opacity
                });
            }

            if (window[`layer_perbatasan_${i}`]) {
                window[`layer_perbatasan_${i}`].setStyle({
                    opacity: opacity
                });
            }
        }

        if (window[`layer_rencana_pola_ruang_perairan`]) {
            window[`layer_rencana_pola_ruang_perairan`].setStyle({
                fillOpacity: opacity
            });
        }
    });


    information_toggle.addEventListener('click', function() {
        var sidebarshow = localStorage.getItem('sidebarshow');
        let marginLeft = '34px';

        if (sidebarshow === 'true') {
            marginLeft = '348px';
        }
        if (information_container.style.display === 'none' || information_container.style.display === '') {
            information_container.style.marginLeft = marginLeft;
            information_container.style.display = 'block';
            information_container.style.width = '320px';
            information_toggle.innerText = 'keyboard_double_arrow_left';
        } else {
            information_container.style.display = 'none';
            information_container.style.width = '0px';
            information_toggle.innerText = 'expand_content';
        }
    });


    search_toggle.addEventListener('click', function() {
        var sidebarshow = localStorage.getItem('sidebarshow');
        let marginLeft = '33px';

        if (sidebarshow === 'true') {
            marginLeft = '347px';
        }

        if (search_tempat.style.display === 'none' || search_tempat.style.display === '') {
            search_tempat.style.display = 'block';
            search_tempat.style.marginLeft = marginLeft;
            search_toggle.innerText = 'keyboard_double_arrow_left';
            icon_toogle_container.style.width = '320px';
        } else {
            search_tempat.style.display = 'none';
            search_toggle.innerText = 'search';
            icon_toogle_container.style.width = '0px';
        }
    });


    collapsebtn.addEventListener('click', function() {
        if (sidebarLeft.style.display === 'none' || sidebarLeft.style.display === '') {
            localStorage.setItem('sidebarshow', 'true');
            console.log('block');
            icon_toogle_container.style.zIndex = '1000';
            icon_toogle_container.style.width = '320px';
            sidebarLeft.style.display = 'block';
            // collapsebtn.style.marginLeft = '300px';
            search_tempat.style.marginLeft = '347px';
            information_container.style.marginLeft = '348px';
            for (let i = 0; i < floatingIcon.length; i++) {
                floatingIcon[i].style.marginLeft = '314px';
            }
            elementOnTopLeft.style.backgroundColor = 'white';
            elementOnTopLeft.style.display = "block";
        } else {
            icon_toogle_container.style.zIndex = '1100';
            icon_toogle_container.style.width = '0px';
            localStorage.setItem('sidebarshow', 'false');
            sidebarLeft.style.display = 'none';
            elementOnTopLeft.style.backgroundColor = 'transparent';
            elementOnTopLeft.style.display = "none";
            search_tempat.style.marginLeft = '33px';
            information_container.style.marginLeft = '34px';
            // collapsebtn.style.marginLeft = '0';
            for (let i = 0; i < floatingIcon.length; i++) {
                floatingIcon[i].style.marginLeft = '0';
            }
        }

        collapsebtn.innerText = collapsebtn.innerText === 'close' ? 'menu' : 'close';
    });
    // sidebar end

    function selectAll() {
        var checkboxes = document.querySelectorAll('input[id="polaruang"]');
        checkboxes.forEach((checkbox) => {
            checkbox.checked = !checkbox.checked;
        });
    }

    function focusLegenda(elementId) {
        elementId = elementId.replace('opacity', 'legenda')
        var element = document.getElementById(elementId);
        var legendaToggle = document.getElementById('information_toggle');

        if (legendaToggle.innerText === 'expand_content') {
            legendaToggle.click();
        }
        if (element) {
            // Gulir ke elemen menggunakan smooth behavior
            element.scrollIntoView({
                behavior: 'smooth',
                block: 'nearest',
                inline: 'start'
            });

            element.classList.add('blinking-border');
            // Hapus kelas setelah 2 detik
            setTimeout(function() {
                element.classList.remove('blinking-border');
            }, 5000);
        }
    }

    function showOpacitySetting(name) {
        var x = document.getElementById(`opacity_${name}`);
        console.log(`opacity_${name}`);
        console.log(`layer_${name}`);
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function setAndSaveOpacity(name) {
        var x = document.getElementById(`opacity_${name}`);
        console.log(`layer_${name}`);
        var opacity = x.value;
        console.log(opacity);
        window[`opacity_${name}`] = opacity;
        const filllist = ['kp2b',
            'kkop',
            'pola',
            'bencana',
            'budaya',
            'air',
            'sempadan',
            'hankam',
            'karst',
            'pertambangan',
            'satwa',
            'dlkp'
        ];
        if (filllist.filter((item) => name.includes(item)).length > 0) {
            console.log('fill');

            if (name.includes('kkop') ||
                name.includes('kp2b') ||
                name.includes('bencana') ||
                name.includes('budaya') ||
                name.includes('air') ||
                name.includes('sempadan') ||
                name.includes('hankam') ||
                name.includes('karst') ||
                name.includes('pertambangan') ||
                name.includes('satwa') ||
                name.includes('dlkp')) {
                if (opacity > 0.5) {
                    opacity = 0.5;
                }
            } else if (name.includes('pola')) {
                if (opacity > 0.8) {
                    opacity = 0.8;
                }
            }
            window[`layer_${name}`].setStyle({
                fillOpacity: opacity
            });
            return;
        }
        window[`layer_${name}`].setStyle({
            opacity: opacity
        });
    }

    setTimeout(() => {
        document.getElementById('collapsebtn').click();
    }, 1000);
</script>