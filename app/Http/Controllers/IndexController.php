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
        return view('pages.index', compact('disclaimer', 'provinsi', 'kabupaten', 'kecamatan'));
    }

    public function tentang()
    {
        $disclaimer = Disclaimer::where('status', 1)->first();
        return view('pages.tentang', compact('disclaimer'));
    }

    public function panduan()
    {
        $disclaimer = Disclaimer::where('status', 1)->first();
        return view('pages.panduan', compact('disclaimer'));
    }

    public function kontak()
    {
        $disclaimer = Disclaimer::where('status', 1)->first();
        return view('pages.kontak', compact('disclaimer'));
    }

    public function kecamatan($id)
    {
        $datas = Kecamatan::join('kabupaten', 'kecamatan.kabupaten_id', 'kabupaten.id')
            ->where('kecamatan.kabupaten_id', $id)
            ->select('kecamatan.*', 'kabupaten.nama as kabupaten')
            ->get();
        return response()->json($datas);
    }
}
