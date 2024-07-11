<script type="text/javascript">
    $(document).ready(function(){
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
<div id="element-on-top-right">
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
</div>

<div id="element-on-top-left">
    <!-- icon toggle -->
    <span class="material-symbols-outlined sidebar_toggle floating-icon" id="collapsebtn" >Menu</span> 
    <span class="material-symbols-outlined sidebar_toggle floating-icon" id="mapin" style="margin-top: 40px">Add</span> 
    <span class="material-symbols-outlined sidebar_toggle floating-icon" id="mapout" style="margin-top: 73px">remove</span>
    <span class="material-symbols-outlined sidebar_toggle floating-icon" style="margin-top: 110px" id="search_toggle">search</span>
    <div class="searchbar_sidebar_container" id="search_tempat_container" style="display: none;">
        <input type="text" class="searchbar_sidebar_input" placeholder="Cari alamat atau tempat" aria-label="Recipient's username" aria-describedby="button-addon2">
        <span class="material-symbols-outlined sidebar_toggle">search</span>
    </div>
    <span class="material-symbols-outlined sidebar_toggle floating-icon" style="margin-top: 149px" id="information_toggle">expand_content</span>
    <div class="information_container" style="display: none">
        <h3 style="font-size: 14px">RDTR 51A7 KAWASAN PERKOTAAN NEGARA</h3>

        <div style="margin-left: 12px;">
            <p>Rencana Pola Ruang</p>
            <div class="block_color_text_container">
                <img alt="Badan Air" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IB2cksfwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAADFJREFUOI1jYaAyYKGZgdPvfPpPiUGZKnyMKAZSC4waOGrgqIGjBtLZQFh5RjUDqQUA5W4E7T2J3aUAAAAASUVORK5CYII=" border="0" width="20" height="20" class="esri-legend__symbol" style="opacity: 0.7;">
                <div>Badan Air</div>
            </div>
            <div class="block_color_text_container">
                <img alt="Badan Air" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAAXNSR0IB2cksfwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAADFJREFUOI1jYaAyYKGZgdPvfPpPiUGZKnyMKAZSC4waOGrgqIGjBtLZQFh5RjUDqQUA5W4E7T2J3aUAAAAASUVORK5CYII=" border="0" width="20" height="20" class="esri-legend__symbol" style="opacity: 0.7;">
                <div>Badan Air</div>
            </div>
        </div>
    </div>
    <div class="sidebar-left" style="background-color: white">
        <!-- <hr> -->
        <!-- <nav class="nav" style="font-size: 14px">
            <a class="nav-link active" aria-current="page" href="#" style="display: flex">
                <span class="material-symbols-outlined" style="font-size: 20px">stacks</span>
              Layer</a>
            <a class="nav-link" href="#" style="display: flex">
                <span class="material-symbols-outlined" style="font-size: 20px">settings</span>
                  Pengaturan
            </a>
            <a class="nav-link" href="#" style="display: flex">
                <span class="material-symbols-outlined" style="font-size: 20px">construction</span>
                  Alat
            </a>
        </nav> -->
        <!-- <hr> -->
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
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="satelit" value="option1">
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
                            <input class="form-check-input" type="checkbox" id="perairan">
                            <label class="form-check-label" for="perairan"><strong>Perairan</strong></label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="label-group">Pilih <b>Kabupaten/Kota</b></label>
                    <select class="form-select" aria-label="Default select example" id="kabupaten">
                        <option selected>Pilih Kabupaten</option>
                        @foreach ($kabupaten as $item)
                            <option value="{{ $item->id }}">{{ ucwords(strtolower($item->nama)) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
<<<<<<< HEAD

        <div class="form-group">
            <input type="checkbox" name="a"> Darat
            <input type="checkbox" name="a"> Perairan
        </div>
        <div class="form-group">
            <label class="label-group">Pilih <b>Kabupaten/Kota</b></label>
            <select class="form-select" aria-label="Default select example" id="kabupaten">
                <option selected>Pilih Kabupaten</option>
                @foreach ($kabupaten as $item)
                    <option value="{{ $item->id }}">{{ ucwords(strtolower($item->nama)) }}</option>
                @endforeach
            </select>
        </div>
<!--         
        <div class="form-group">
            <label class="label-group">Pilih <b>Kecamatan</b></label>
            <select class="form-select" aria-label="Default select example" id="kecamatan">
                <option selected>Pilih Kecamatan</option>
                {{-- @foreach ($kecamatan as $item)
                    <option value="{{ $item->id }}">{{ ucwords(strtolower($item->nama)) }}</option>
                @endforeach --}}
            </select>
        </div> -->
        {{-- <div class="form-group">
            <label class="label-group">Pilih <b>RDTR</b></label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div> --}}
        <div class="d-grid gap-1">
            <button class="btn btn-primary" type="button" id="btnlayer">Terapkan Layer</button>
        </div>
        <hr>
        <div class="form-group">
            <label>Saring berdasarkan <b>Kegiatan</b></label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Semua</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
=======
        <hr />
        <div class="card">
            <div class="card-header bg-third">{{ __('Rencana Pola Ruang') }}</div>
            <div class="card-body"> 
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" onclick="selectAll()">
                    <label class="form-check-label" for="defaultCheck1">
                        <strong>Pilih Semua Layer</strong>
                    </label>
                </div>
                <div class="list-group mt-2">
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
                                        <!-- Add arrow down in right -->
                                        {{-- <span class="material-symbols-outlined mt-1" style="font-size: 20px; float: right">expand_more</span> --}}
                                    </div>
                                </div>
                                <div class="col-3 align-items-stretch">
                                    <!-- badge -->
                                    <span class="badge rounded-pill bg-primary mt-1" style="float: right">:::</span>
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
                                        </div>
                                    </div>
                                    <div class="col-3 align-items-stretch">
                                        <!-- badge -->
                                        <span class="badge rounded-pill bg-warning mt-1" style="float: right">:::</span>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
>>>>>>> 55c3325b537b6474083fda41b0fb2e54c11d07d5
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
    var btnclosekoordinat = document.getElementById('btnclosekoordinat');
    var search_toggle = document.getElementById('search_toggle');
    var search_tempat = document.getElementById('search_tempat_container');
    var information_toggle = document.getElementById('information_toggle');
    var information_container = document.querySelector('.information_container');
    localStorage.setItem('sidebarshow', 'false');


    information_toggle.addEventListener('click', function() {
        var sidebarshow = localStorage.getItem('sidebarshow');
        let marginLeft = '34px';

        if (sidebarshow === 'true') {
            marginLeft = '341px';
        }
        if (information_container.style.display === 'none' || information_container.style.display === '') {
            information_container.style.marginLeft = marginLeft;
            information_container.style.display = 'block';
            information_toggle.innerText = 'keyboard_double_arrow_left';
        } else {
            
            information_container.style.display = 'none';
            information_toggle.innerText = 'expand_content';
        }
    });


    search_toggle.addEventListener('click', function() {
        var sidebarshow = localStorage.getItem('sidebarshow');
        let marginLeft = '33px';

        if (sidebarshow === 'true') {
            marginLeft = '338px';
        }

        if (search_tempat.style.display === 'none' || search_tempat.style.display === '') {
            search_tempat.style.display = 'block';
            search_tempat.style.marginLeft = marginLeft;
            search_toggle.innerText = 'keyboard_double_arrow_left';
        } else {
            search_tempat.style.display = 'none';
            search_toggle.innerText = 'search';
        }
    });


    btnclosekoordinat.addEventListener('click', function() {
        koordinatPanel.style.display = 'none';
        btnkoordinat.style.display = 'flex';
        sidebarRight.style.display = 'none';
        elementOnTopRight.style.top = '40px';
        elementOnTopRight.style.backgroundColor = 'transparent';
        localStorage.setItem('sidebarshow', 'false');
    });


    btnkoordinat.addEventListener('click', function() {
        btnkoordinat.style.display = 'none';
        if (sidebarRight.style.display === 'none' || sidebarRight.style.display === '') {
            sidebarRight.style.display = 'block';
            koordinatPanel.style.display = 'block';
            elementOnTopRight.style.top = '77px';
            elementOnTopRight.style.backgroundColor = 'white';
        } else {
            sidebarRight.style.display = 'none';
            koordinatPanel.style.display = 'none';
            elementOnTopRight.style.top = '40px';
            elementOnTopRight.style.backgroundColor = 'transparent';
        }
    });

    collapsebtn.addEventListener('click', function() {
        if (sidebarLeft.style.display === 'none' || sidebarLeft.style.display === '') {
            localStorage.setItem('sidebarshow', 'true');
            console.log('block');
            sidebarLeft.style.display = 'block';
            // collapsebtn.style.marginLeft = '300px';
            search_tempat.style.marginLeft = '338px';
            information_container.style.marginLeft = '341px';
            for (let i = 0; i < floatingIcon.length; i++) {
                floatingIcon[i].style.marginLeft = '304px';
            }
            elementOnTopLeft.style.backgroundColor = 'white';
        } else {
            localStorage.setItem('sidebarshow', 'false');
            sidebarLeft.style.display = 'none';
            elementOnTopLeft.style.backgroundColor = 'transparent';
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
</script>