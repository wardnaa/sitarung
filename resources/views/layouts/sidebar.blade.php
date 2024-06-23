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
    <span class="material-symbols-outlined sidebar_toggle floating-icon" style="margin-top: 110px">print</span>
    <span class="material-symbols-outlined sidebar_toggle floating-icon" style="margin-top: 149px">window</span>  
    <div class="sidebar-left" style="background-color: white">
        <hr>
        <nav class="nav" style="font-size: 14px">
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
        </nav>
        <hr>
        <div class="form-group">
            <label class="label-group">Pilih <b>Provinsi</b></label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="form-group">
           <label class="label-group">Pilih <b>Kabupaten/Kota</b></label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="form-group">
            <label class="label-group">Pilih <b>RDTR</b></label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="d-grid gap-1">
            <button class="btn btn-primary" type="button">Terapkan Layer</button>
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


    btnclosekoordinat.addEventListener('click', function() {
        koordinatPanel.style.display = 'none';
        btnkoordinat.style.display = 'flex';
        sidebarRight.style.display = 'none';
        elementOnTopRight.style.top = '40px';
        elementOnTopRight.style.backgroundColor = 'transparent';
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
            console.log('block');
            sidebarLeft.style.display = 'block';
            // collapsebtn.style.marginLeft = '300px';
            for (let i = 0; i < floatingIcon.length; i++) {
                floatingIcon[i].style.marginLeft = '304px';
            }
            elementOnTopLeft.style.backgroundColor = 'white';
        } else {
            sidebarLeft.style.display = 'none';
            elementOnTopLeft.style.backgroundColor = 'transparent';
            // collapsebtn.style.marginLeft = '0';
            for (let i = 0; i < floatingIcon.length; i++) {
                floatingIcon[i].style.marginLeft = '0';
            }
        }

        collapsebtn.innerText = collapsebtn.innerText === 'close' ? 'menu' : 'close';
    });
    // sidebar end
</script>