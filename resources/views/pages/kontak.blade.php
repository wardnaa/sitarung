@extends('layouts.index')

@section('content')<div class="container">
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">{{ __('Sistem Informasi Tata Ruang') }}</div>
            <div class="card-body">
                <h4 style="font-weight: bold;">Kontak Kami</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <!--Maps Dinas PU Beliton Denpasar-->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.292394292073!2d115.213366314775!3d-8.648366993773073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd24f1b1b1b1b1b%3A0x1b1b1b1b1b1b1b1b!2sDinas%20Pekerjaan%20Umum%20Pemerintah%20Provinsi%20Bali!5e0!3m2!1sid!2sid!4v1629786820004!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    <div class="col-md-6">
                        <p class="m-0 p-0"><strong>Kontak Kami</strong></p>
                        <p>Alamat: <a class="text-warning" href="https://goo.gl/maps/edKHBSGJhwrnjN5Y6">Jl. Beliton No.2, Dauh Puri Kangin, Kec. Denpasar Bar., Kota Denpasar, Bali 80232</a></p>
                        <p class="m-0 p-0">No. Telp: (0361) 222883</p>
                        <p class="m-0 p-0">E-mail : <a class="text-warning" href="mailto: puprkim@baliprov.go.id" target="_blank" rel="noopener"> puprkim@baliprov.go.id</a></p>
                        <p class="m-0 p-0">Facebook: <a class="text-warning" href="https://www.facebook.com/DinasPUPRKIMProvinsiBali">DinasPUPRKIMProvinsiBali</a></p>
                        <br />
                        <p class="m-0 p-0">Link : <a class="text-warning" href="https://balikom.info/SosialisasiPerdaRTRWPBali">Sosialisasi Perda RTRWP Bali</a></p>
                        <p class="m-0 p-0">Link : <a class="text-warning" href="http://linktr.ee/simandaratarubali">Simandaratarubali</a></p>
                    </div>
                </div>            
            </div>
        </div>
    </div>
</div>
@endsection