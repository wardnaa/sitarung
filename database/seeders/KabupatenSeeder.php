<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                "id"=>"5101",
                "provinsi_id"=>"51",
                "nama"=>"KAB. JEMBRANA"
            ],[
                "id"=>"5102",
                "provinsi_id"=>"51",
                "nama"=>"KAB. TABANAN"
            ],[
                "id"=>"5103",
                "provinsi_id"=>"51",
                "nama"=>"KAB. BADUNG"
            ],[
                "id"=>"5104",
                "provinsi_id"=>"51",
                "nama"=>"KAB. GIANYAR"
            ],[
                "id"=>"5105",
                "provinsi_id"=>"51",
                "nama"=>"KAB. KLUNGKUNG"
            ],[
                "id"=>"5106",
                "provinsi_id"=>"51",
                "nama"=>"KAB. BANGLI"
            ],[
                "id"=>"5107",
                "provinsi_id"=>"51",
                "nama"=>"KAB. KARANGASEM"
            ],[
                "id"=>"5108",
                "provinsi_id"=>"51",
                "nama"=>"KAB. BULELENG"
            ],[
                "id"=>"5171",
                "provinsi_id"=>"51",
                "nama"=>"KOTA DENPASAR"
            ]
        ];

        foreach ($datas as $data) {
            DB::table('kabupaten')->insert([
                'id' => $data['id'],
                'provinsi_id' => $data['provinsi_id'],
                'nama' => $data['nama'],
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
