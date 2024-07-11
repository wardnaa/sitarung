<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PolaRuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                "id" => 1,
                "parent" => 0,
                "name" => "Rencana Pola Ruang",
                "header" => 0
            ],[
                "id" => 2,
                "parent" => 0,
                "name" => "Batas Kecaamatan",
                "header" => 0
            ],[
                "id" => 3,
                "parent" => 0,
                "name" => "Ketentuan Khusus",
                "header" => 1
            ],[
                "id" => 4,
                "parent" => 3,
                "name" => "Ketentuan Khusus KKOP",
                "header" => 0
            ],[
                "id" => 5,
                "parent" => 3,
                "name" => "Ketentuan Khusus KP2B",
                "header" => 0
            ],[
                "id" => 6,
                "parent" => 3,
                "name" => "Ketentuan Khusus BENCANA",
                "header" => 0
            ],[
                "id" => 7,
                "parent" => 3,
                "name" => "Ketentuan Khusus CAGAR BUDAYA",
                "header" => 0
            ],[
                "id" => 8,
                "parent" => 3,
                "name" => "Ketentuan Khusus RESAPAN AIR",
                "header" => 0
            ],[
                "id" => 9,
                "parent" => 3,
                "name" => "Ketentuan Khusus SEMPADAN",
                "header" => 0
            ],[
                "id" => 10,
                "parent" => 3,
                "name" => "Ketentuan Khusus HANKAM",
                "header" => 0
            ],[
                "id" => 11,
                "parent" => 3,
                "name" => "Ketentuan Khusus KARST",
                "header" => 0
            ],[
                "id" => 12,
                "parent" => 3,
                "name" => "Ketentuan Khusus PERTAMBANGAN",
                "header" => 0
            ],[
                "id" => 13,
                "parent" => 3,
                "name" => "Ketentuan Khusus MIGRASI SATWA",
                "header" => 0
            ],[
                "id" => 14,
                "parent" => 3,
                "name" => "Ketentuan Khusus DLKP",
                "header" => 0
            ],[
                "id" => 15,
                "parent" => 0,
                "name" => "Sistem Pusat Permukiman",
                "header" => 0
            ],[
                "id" => 16,
                "parent" => 0,
                "name" => "Sistem Jaringan Transportasi",
                "header" => 1
            ],[
                "id" => 17,
                "parent" => 16,
                "name" => "Jaringan Transportasi",
                "header" => 0
            ],[
                "id" => 18,
                "parent" => 16,
                "name" => "Infrastruktur Transportasi",
                "header" => 0
            ],[
                "id" => 19,
                "parent" => 0,
                "name" => "Sistem Jaringan Energi",
                "header" => 1
            ],[
                "id" => 20,
                "parent" => 19,
                "name" => "Jaringan Energi",
                "header" => 0
            ],[
                "id" => 21,
                "parent" => 19,
                "name" => "Infrastruktur Energi",
                "header" => 0
            ],[
                "id" => 22,
                "parent" => 0,
                "name" => "Sistem Jaringan Telekomunikasi",
                "header" => 1
            ],[
                "id" => 23,
                "parent" => 22,
                "name" => "Jaringan Tetap",
                "header" => 0
            ],[
                "id" => 24,
                "parent" => 22,
                "name" => "Infrastruktur Jaringan Tetap",
                "header" => 0
            ],[
                "id" => 25,
                "parent" => 0,
                "name" => "Sistem Jaringan Sumber Daya Air",
                "header" => 1
            ],[
                "id" => 26,
                "parent" => 25,
                "name" => "Jaringan Sumber Daya Air",
                "header" => 0
            ],[
                "id" => 27,
                "parent" => 25,
                "name" => "Infrastruktur Sumber Daya Air",
                "header" => 0
            ],[
                "id" => 28,
                "parent" => 0,
                "name" => "Sistem Jaringan Prasarana Lainnya",
                "header" => 1
            ],[
                "id" => 29,
                "parent" => 28,
                "name" => "Jaringan Prasarana Lainnya",
                "header" => 0
            ],[
                "id" => 30,
                "parent" => 28,
                "name" => "Infrastruktur Prasarana Lainnya",
                "header" => 0
            ],
        ];

        foreach ($datas as $data) {
            DB::table('polaruang')->insert([
                'id' => $data['id'],
                'parent' => $data['parent'],
                'nama' => $data['name'],
                'header' => $data['header'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
