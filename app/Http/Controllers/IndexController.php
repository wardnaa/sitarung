<?php

namespace App\Http\Controllers;

use App\Models\Disclaimer;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $disclaimer = Disclaimer::where('status', 1)->first();
        $provinsi = Provinsi::where('id', 51)->get();
        $kabupaten = Kabupaten::where('provinsi_id', 51)->get();
        $kecamatan = Kecamatan::where('kabupaten_id', 5101)->get();
        return view('index', compact('disclaimer', 'provinsi', 'kabupaten', 'kecamatan'));
    }
}
