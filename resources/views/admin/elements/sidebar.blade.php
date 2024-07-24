<!-- Sidebar -->
<!-- Give class="active" to the active page -->
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush">
            <a href="{{ url('admin') }}" class="list-group-item list-group-item-action py-2 ripple {{ Request::is('admin') ? 'active' : '' }}" aria-current="true">
                <span>Dashboard</span>
            </a>
            <a href="{{ url('admin/kabupaten') }}" class="list-group-item list-group-item-action py-2 ripple {{ Request::is('admin/kabupaten') ? 'active' : '' }}">
                <span>Data Kabupaten</span>
            </a>
            <a href="{{ url('admin/polaruang') }}" class="list-group-item list-group-item-action py-2 ripple {{ Request::is('admin/polaruang') ? 'active' : '' }}">
                <span>Data Pola Ruang</span>
            </a>
            <a href="{{ url('admin/pengguna') }}" class="list-group-item list-group-item-action py-2 ripple {{ Request::is('admin/pengguna') ? 'active' : '' }}">
                <span>Data Pengguna</span>
            </a>
            <a href="{{ url('admin/disclaimer') }}" class="list-group-item list-group-item-action py-2 ripple {{ Request::is('admin/disclaimer') ? 'active' : '' }}">
                <span>Disclaimer</span>
            </a>
            {{-- <a href="{{ url('admin/halaman') }}" class="list-group-item list-group-item-action py-2 ripple {{ Request::is('admin/halaman') ? 'active' : '' }}">
                <span>Halaman</span>
            </a> --}}
        </div>
    </div>
</nav>
<!-- Sidebar -->