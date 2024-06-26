<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            // 5101 => Jembrana
            [
                "id"=>"510101",
                "kabupaten_id"=>"5101",
                "nama"=>"Negara"
            ],[
                "id"=>"510102",
                "kabupaten_id"=>"5101",
                "nama"=>"Mendoyo"
            ],[
                "id"=>"510103",
                "kabupaten_id"=>"5101",
                "nama"=>"Pekutatan"
            ],[
                "id"=>"510104",
                "kabupaten_id"=>"5101",
                "nama"=>"Melaya"
            ],[
                "id"=>"510105",
                "kabupaten_id"=>"5101",
                "nama"=>"Jembrana"
            ],
            // 5102 => Tabanan
            [
                "id"=>"510201",
                "kabupaten_id"=>"5102",
                "nama"=>"Selemadeg"
            ],[
                "id"=>"510202",
                "kabupaten_id"=>"5102",
                "nama"=>"Selemadeg Timur"
            ],[
                "id"=>"510203",
                "kabupaten_id"=>"5102",
                "nama"=>"Selemadeg Barat"
            ],[
                "id"=>"510204",
                "kabupaten_id"=>"5102",
                "nama"=>"Kerambitan"
            ],[
                "id"=>"510205",
                "kabupaten_id"=>"5102",
                "nama"=>"Tabanan"
            ],[
                "id"=>"510206",
                "kabupaten_id"=>"5102",
                "nama"=>"Kediri"
            ],[
                "id"=>"510207",
                "kabupaten_id"=>"5102",
                "nama"=>"Marga"
            ],[
                "id"=>"510208",
                "kabupaten_id"=>"5102",
                "nama"=>"Baturiti"
            ],[
                "id"=>"510209",
                "kabupaten_id"=>"5102",
                "nama"=>"Penebel"
            ],[
                "id"=>"510210",
                "kabupaten_id"=>"5102",
                "nama"=>"Pupuan"
            ],
            // 5103 => Badung
            [
                "id"=>"510301",
                "kabupaten_id"=>"5103",
                "nama"=>"Kuta"
            ],[
                "id"=>"510302",
                "kabupaten_id"=>"5103",
                "nama"=>"Mengwi"
            ],[
                "id"=>"510303",
                "kabupaten_id"=>"5103",
                "nama"=>"Abiansemal"
            ],[
                "id"=>"510304",
                "kabupaten_id"=>"5103",
                "nama"=>"Petang"
            ],[
                "id"=>"510305",
                "kabupaten_id"=>"5103",
                "nama"=>"Kuta Utara"
            ],[
                "id"=>"510306",
                "kabupaten_id"=>"5103",
                "nama"=>"Kuta Selatan"
            ],[
                "id"=>"510307",
                "kabupaten_id"=>"5103",
                "nama"=>"Kuta Tengah"
            ],[
                "id"=>"510308",
                "kabupaten_id"=>"5103",
                "nama"=>"Nusa Dua"
            ],[
                "id"=>"510309",
                "kabupaten_id"=>"5103",
                "nama"=>"Seminyak"
            ],
            // 5104 => Gianyar
            [
                "id"=>"510401",
                "kabupaten_id"=>"5104",
                "nama"=>"Sukawati"
            ],[
                "id"=>"510402",
                "kabupaten_id"=>"5104",
                "nama"=>"Blahbatuh"
            ],[
                "id"=>"510403",
                "kabupaten_id"=>"5104",
                "nama"=>"Gianyar"
            ],[
                "id"=>"510404",
                "kabupaten_id"=>"5104",
                "nama"=>"Tampaksiring"
            ],[
                "id"=>"510405",
                "kabupaten_id"=>"5104",
                "nama"=>"Ubud"
            ],[
                "id"=>"510406",
                "kabupaten_id"=>"5104",
                "nama"=>"Tegalalang"
            ],[
                "id"=>"510407",
                "kabupaten_id"=>"5104",
                "nama"=>"Payangan"
            ],
            // 5105 => Kelungkung
            [
                "id"=>"510501",
                "kabupaten_id"=>"5105",
                "nama"=>"Nusa Penida"
            ],[
                "id"=>"510502",
                "kabupaten_id"=>"5105",
                "nama"=>"Banjarangkan"
            ],[
                "id"=>"510503",
                "kabupaten_id"=>"5105",
                "nama"=>"Dawan"
            ],
            // 5106 => Bangli
            [
                "id"=>"510601",
                "kabupaten_id"=>"5106",
                "nama"=>"Susut"
            ],[
                "id"=>"510602",
                "kabupaten_id"=>"5106",
                "nama"=>"Bangli"
            ],[
                "id"=>"510603",
                "kabupaten_id"=>"5106",
                "nama"=>"Tembuku"
            ],[
                "id"=>"510604",
                "kabupaten_id"=>"5106",
                "nama"=>"Kintamani"
            ],
            // 5107 => Karangasem
            [
                "id"=>"510701",
                "kabupaten_id"=>"5107",
                "nama"=>"Rendang"
            ],[
                "id"=>"510702",
                "kabupaten_id"=>"5107",
                "nama"=>"Sidemen"
            ],[
                "id"=>"510703",
                "kabupaten_id"=>"5107",
                "nama"=>"Manggis"
            ],[
                "id"=>"510704",
                "kabupaten_id"=>"5107",
                "nama"=>"Karangasem"
            ],[
                "id"=>"510705",
                "kabupaten_id"=>"5107",
                "nama"=>"Abang"
            ],[
                "id"=>"510706",
                "kabupaten_id"=>"5107",
                "nama"=>"Bebandem"
            ],[
                "id"=>"510707",
                "kabupaten_id"=>"5107",
                "nama"=>"Selat"
            ],[
                "id"=>"510708",
                "kabupaten_id"=>"5107",
                "nama"=>"Kubu"
            ],
            // 5108 => Buleleng
            [
                "id"=>"510801",
                "kabupaten_id"=>"5108",
                "nama"=>"Gerokgak"
            ],[
                "id"=>"510802",
                "kabupaten_id"=>"5108",
                "nama"=>"Seririt"
            ],[
                "id"=>"510803",
                "kabupaten_id"=>"5108",
                "nama"=>"Busungbiu"
            ],[
                "id"=>"510804",
                "kabupaten_id"=>"5108",
                "nama"=>"Banjar"
            ],[
                "id"=>"510805",
                "kabupaten_id"=>"5108",
                "nama"=>"Sukasada"
            ],[
                "id"=>"510806",
                "kabupaten_id"=>"5108",
                "nama"=>"Buleleng"
            ],[
                "id"=>"510807",
                "kabupaten_id"=>"5108",
                "nama"=>"Sawan"
            ],[
                "id"=>"510808",
                "kabupaten_id"=>"5108",
                "nama"=>"Kubutambahan"
            ],[
                "id"=>"510809",
                "kabupaten_id"=>"5108",
                "nama"=>"Tejakula"
            ],
            // 5171 => Denpasar
            [
                "id"=>"517101",
                "kabupaten_id"=>"5171",
                "nama"=>"Denpasar Selatan"
            ],[
                "id"=>"517102",
                "kabupaten_id"=>"5171",
                "nama"=>"Denpasar Timur"
            ],[
                "id"=>"517103",
                "kabupaten_id"=>"5171",
                "nama"=>"Denpasar Barat"
            ],[
                "id"=>"517104",
                "kabupaten_id"=>"5171",
                "nama"=>"Denpasar Utara"
            ]
        ];

        foreach ($datas as $data) {
            DB::table('kecamatan')->insert([
                'id' => $data['id'],
                'kabupaten_id' => $data['kabupaten_id'],
                'nama' => strtoupper($data['nama']),
            ]);
        }
    }
}
