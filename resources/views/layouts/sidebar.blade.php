<div id="element-on-top">
    <!-- icon toggle -->
    <span class="material-symbols-outlined" id="collapsebtn" style="border: 1px solid #ccc; background: white; cursor:pointer;">Menu</span>
    <div class="sidebar" style="background-color: white">
        <div class="sidebar-header">
        </div>
        <ul class="sidebar-list">
            <li>
                <a href="#">Beranda</a>
            </li>
            <li>
                <a href="#">Selayang Pandang</a>
            </li>
            <li>
                <a href="#">Panduan</a>
            </li>
            <li>
                <a href="#">Kontak Kami</a>
            </li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    // sidebar start
    var elementOnTop = document.getElementById('element-on-top');
    var sidebar = document.querySelector('.sidebar');
    var collapsebtn = document.getElementById('collapsebtn');

    collapsebtn.addEventListener('click', function() {
        if (sidebar.style.display === 'none' || sidebar.style.display === '') {
            console.log('block');
            sidebar.style.display = 'block';
            elementOnTop.style.backgroundColor = 'white';
        } else {
            sidebar.style.display = 'none';
            elementOnTop.style.backgroundColor = 'transparent';
        }

        collapsebtn.innerText = collapsebtn.innerText === 'close' ? 'menu' : 'close';
    });
    // sidebar end
</script>