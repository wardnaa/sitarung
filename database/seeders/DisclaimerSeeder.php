<?php

namespace Database\Seeders;

use App\Models\Disclaimer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisclaimerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'judul' => 'Disclaimer',
                'konten' => '<ul class="a" text-align="justify">
<li text-align="justify">Provinsi Bali menyediakan data-data Rencana Tata Ruang yang terbuka untuk publik dan dimaksudkan untuk mewujudkan keterbukaan informasi bagi masyarakat;</li>
<li>Data peta yang disajikan merujuk pada https://tarubali.baliprov.go.id/;</li>
<li>Data yang tersedia disitus ini merupakan data Provinsi Bali yang sudah menjadi produk hukum (Perda 02 Tahun 2023);</li>
<li>Informasi tata ruang ini bukan merupakan dasar acuan dalam penerbitan Kesesuaian Kegiatan Pemanfaatan Ruang (KKPR), dalam hal telah ditetapkan rencana tata ruang dibawahnya yang lebih operasional maka penerbitan KKPR mengacu pada rencana tata ruang tersebut;</li>
<li>Kelengkapan data yang disajikan sesuai dengan produk hukum yang berlaku dan “sebagaimana adanya” (as is);</li>
<li>Kami berusaha menyajikan data seakurat mungkin, apabila terjadi terdapat perbedaan maka kembali kepada produk hukum yang berlaku;</li>
<li>Provinsi Bali tidak bertanggungjawab atas segala kesalahan atau kerugian yang timbul karena tindakan yang berkaitan dengan penggunaan data/informasi yang disajikan pada situs ini;</li>
<li>Provinsi Bali tidak bertanggungjawab atas data/informasi yang disampaikan oleh pihak ketiga yang menggunakan service dari situs ini, dan berlaku sebaliknya (vice versa);</li>
<li>Pengembangan SIGTARU Bali lebih lanjut dikembangkan oleh Dinas Komunikasi dan Informatika Provinsi Bali;</li>
<li>Dengan menggunakan situs ini, pengguna setuju dengan Syarat dan Ketentuan yang berlaku.</li>
</ul>
<p>
<b>Dinas Pekerjaan Umum, Penataan Ruang, Perumahan, dan Kawasan Permukiman<br></b>
Jalan Beliton, 02 <br>
Telp./Fax. (0361) 222883
</p>'
            ]
        ];

        foreach ($datas as $data) {
            Disclaimer::create($data);
        }
    }
}
