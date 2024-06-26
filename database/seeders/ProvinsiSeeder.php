<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            ["id"=>"11","nama"=>"ACEH"],["id"=>"12","nama"=>"SUMATERA UTARA"],["id"=>"13","nama"=>"SUMATERA BARAT"],["id"=>"14","nama"=>"RIAU"],["id"=>"15","nama"=>"JAMBI"],["id"=>"16","nama"=>"SUMATERA SELATAN"],["id"=>"17","nama"=>"BENGKULU"],["id"=>"18","nama"=>"LAMPUNG"],["id"=>"19","nama"=>"KEPULAUAN BANGKA BELITUNG"],["id"=>"21","nama"=>"KEPULAUAN RIAU"],["id"=>"31","nama"=>"DKI JAKARTA"],["id"=>"32","nama"=>"JAWA BARAT"],["id"=>"33","nama"=>"JAWA TENGAH"],["id"=>"34","nama"=>"DAERAH ISTIMEWA YOGYAKARTA"],["id"=>"35","nama"=>"JAWA TIMUR"],["id"=>"36","nama"=>"BANTEN"],["id"=>"51","nama"=>"BALI"],["id"=>"52","nama"=>"NUSA TENGGARA BARAT"],["id"=>"53","nama"=>"NUSA TENGGARA TIMUR"],["id"=>"61","nama"=>"KALIMANTAN BARAT"],["id"=>"62","nama"=>"KALIMANTAN TENGAH"],["id"=>"63","nama"=>"KALIMANTAN SELATAN"],["id"=>"64","nama"=>"KALIMANTAN TIMUR"],["id"=>"65","nama"=>"KALIMANTAN UTARA"],["id"=>"71","nama"=>"SULAWESI UTARA"],["id"=>"72","nama"=>"SULAWESI TENGAH"],["id"=>"73","nama"=>"SULAWESI SELATAN"],["id"=>"74","nama"=>"SULAWESI TENGGARA"],["id"=>"75","nama"=>"GORONTALO"],["id"=>"76","nama"=>"SULAWESI BARAT"],["id"=>"81","nama"=>"MALUKU"],["id"=>"82","nama"=>"MALUKU UTARA"],["id"=>"91","nama"=>"P A P U A"],["id"=>"92","nama"=>"PAPUA BARAT"]
        ];

        foreach ($datas as $data) {
            DB::table('provinsi')->insert([
                'id' => $data['id'],
                'nama' => $data['nama'],
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
