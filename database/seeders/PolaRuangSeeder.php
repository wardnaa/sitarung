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
                "header" => 0,
                "category" => "pola-ruang"
            ],[
                "id" => 2,
                "parent" => 0,
                "name" => "Ketentuan Khusus",
                "header" => 1,
                "category" => "ketentuan-khusus"
            ],[
                "id" => 3,
                "parent" => 2,
                "name" => "Ketentuan Khusus KKOP",
                "header" => 0,
                "category" => "ketentuan-khusus"
            ],[
                "id" => 4,
                "parent" => 2,
                "name" => "Ketentuan Khusus KP2B",
                "header" => 0,
                "category" => "ketentuan-khusus"
            ],[
                "id" => 5,
                "parent" => 2,
                "name" => "Ketentuan Khusus BENCANA",
                "header" => 0,
                "category" => "ketentuan-khusus"
            ],[
                "id" => 6,
                "parent" => 2,
                "name" => "Ketentuan Khusus CAGAR BUDAYA",
                "header" => 0,
                "category" => "ketentuan-khusus"
            ],[
                "id" => 7,
                "parent" => 2,
                "name" => "Ketentuan Khusus RESAPAN AIR",
                "header" => 0,
                "category" => "ketentuan-khusus"
            ],[
                "id" => 8,
                "parent" => 2,
                "name" => "Ketentuan Khusus SEMPADAN",
                "header" => 0,
                "category" => "ketentuan-khusus"
            ],[
                "id" => 9,
                "parent" => 2,
                "name" => "Ketentuan Khusus HANKAM",
                "header" => 0,
                "category" => "ketentuan-khusus"
            ],[
                "id" => 10,
                "parent" => 2,
                "name" => "Ketentuan Khusus KARST",
                "header" => 0,
                "category" => "ketentuan-khusus"
            ],[
                "id" => 11,
                "parent" => 2,
                "name" => "Ketentuan Khusus PERTAMBANGAN",
                "header" => 0,
                "category" => "ketentuan-khusus"
            ],[
                "id" => 12,
                "parent" => 2,
                "name" => "Ketentuan Khusus MIGRASI SATWA",
                "header" => 0,
                "category" => "ketentuan-khusus"
            ],[
                "id" => 13,
                "parent" => 2,
                "name" => "Ketentuan Khusus DLKP",
                "header" => 0,
                "category" => "ketentuan-khusus"
            ],[
                "id" => 14,
                "parent" => 0,
                "name" => "Sistem Pusat Permukiman",
                "header" => 0,
                "category" => "pola-ruang"
            ],[
                "id" => 15,
                "parent" => 0,
                "name" => "Sistem Jaringan Transportasi",
                "header" => 1,
                "category" => "struktur-ruang"
            ],[
                "id" => 16,
                "parent" => 15,
                "name" => "Jaringan Transportasi",
                "header" => 0,
                "category" => "struktur-ruang"
            ],[
                "id" => 17,
                "parent" => 15,
                "name" => "Infrastruktur Transportasi",
                "header" => 0,
                "category" => "struktur-ruang"
            ],[
                "id" => 18,
                "parent" => 0,
                "name" => "Sistem Jaringan Energi",
                "header" => 1,
                "category" => "struktur-ruang"
            ],[
                "id" => 19,
                "parent" => 18,
                "name" => "Jaringan Energi",
                "header" => 0,
                "category" => "struktur-ruang"
            ],[
                "id" => 20,
                "parent" => 18,
                "name" => "Infrastruktur Energi",
                "header" => 0,
                "category" => "struktur-ruang"
            ],[
                "id" => 21,
                "parent" => 0,
                "name" => "Sistem Jaringan Telekomunikasi",
                "header" => 1,
                "category" => "struktur-ruang"
            ],[
                "id" => 22,
                "parent" => 21,
                "name" => "Jaringan Tetap",
                "header" => 0,
                "category" => "struktur-ruang"
            ],[
                "id" => 23,
                "parent" => 21,
                "name" => "Infrastruktur Jaringan Tetap",
                "header" => 0,
                "category" => "struktur-ruang"
            ],[
                "id" => 24,
                "parent" => 0,
                "name" => "Sistem Jaringan Sumber Daya Air",
                "header" => 1,
                "category" => "struktur-ruang"
            ],[
                "id" => 25,
                "parent" => 24,
                "name" => "Jaringan Sumber Daya Air",
                "header" => 0,
                "category" => "struktur-ruang"
            ],[
                "id" => 26,
                "parent" => 24,
                "name" => "Infrastruktur Sumber Daya Air",
                "header" => 0,
                "category" => "struktur-ruang"
            ],[
                "id" => 27,
                "parent" => 0,
                "name" => "Sistem Jaringan Prasarana Lainnya",
                "header" => 1,
                "category" => "struktur-ruang"
            ],[
                "id" => 28,
                "parent" => 27,
                "name" => "Jaringan Prasarana Lainnya",
                "header" => 0,
                "category" => "struktur-ruang"
            ],[
                "id" => 29,
                "parent" => 27,
                "name" => "Infrastruktur Prasarana Lainnya",
                "header" => 0,
                "category" => "struktur-ruang"
            ],
        ];

        foreach ($datas as $data) {
            DB::table('polaruang')->insert([
                'id' => $data['id'],
                'parent' => $data['parent'],
                'nama' => $data['name'],
                'header' => $data['header'],
                'category' => $data['category'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
