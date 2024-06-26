@extends('layouts.index')

@section('content')<div class="container">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary text-white">{{ __('Sistem Informasi Tata Ruang') }}</div>
            <div class="card-body">
                <h4 style="font-weight: bold;">Selayang Pandang</h4>
                <hr>
                <!--Embed Youtube Video-->
                <div class="row">
                    <div class="col-md-5">
                        <!-- iframe size 560x315 -->
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/uRJV01I3f1k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="col-md-7">
                        <p style="font-weight: bold;">
                            Tujuan Penataan Ruang
                            Dalam Perda Nomor 02 Tahun 2023
                            tentang Rencana Tata Ruang Wilayah
                            Provinsi Bali Tahun 2023-2043
                        </p>
                        <p>
                            "Mewujudkan Ruang Wilayah yang berkualitas, aman, nyaman, produktif, berjati diri, berdaya saing, dan berkelanjutan sebagai pusat kegiatan ekonomi hijau berbasis pariwisata, pertanian, kelautan, dan industri kreatif dalam rangka menjaga keharmonisan Alam, Manusia, dan Kebudayaan Bali berlandaskan nilai-nilai kearifan lokal Sad Kerthi dan filosofi Tri Hita Karana."
                        </p>
                        <p>
                            SIGTARU merupakan sistem informasi data spasial yang didalamnya merupakan sistem Informasi penataan ruang berbasis Web GIS (Geographic Information System) yang dikembangkan oleh Pemerintah Provinsi Bali yang memuat data / informasi perencanaan dan pemanfaatan tata ruang di Provinsi Bali. Maksud dikembangkannya SIRTRW ini adalah dalam rangka sosialisasi informasi penataan ruang kepada masyarakat luas. Adapun tujuan yang ingin dicapai adalah untuk penyebarluasan informasi tentang Rencana Tata Ruang Wilayah (RTRW) Provinsi Bali.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection