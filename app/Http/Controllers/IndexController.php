<?php

namespace App\Http\Controllers;

use App\Models\Disclaimer;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\PolaRuang;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $disclaimer = Disclaimer::where('status', 1)->first();
        $provinsi = Provinsi::where('id', 51)->orderBy('nama', 'asc')->get();
        $kabupaten = Kabupaten::where('provinsi_id', 51)->orderBy('nama', 'asc')->get();
        $kecamatan = Kecamatan::where('kabupaten_id', 5101)->orderBy('nama', 'asc')->get();
        // Get data pola ruang with parent tree
        $polaruang = PolaRuang::where('parent', 0)->where('category','pola-ruang')->orderBy('id', 'asc')->get();
        $polaruang->map(function ($item) {
            $item->children = PolaRuang::where('parent', $item->id)->orderBy('id', 'asc')->get();
            $item->children->map(function ($child) {
                $child->children = PolaRuang::where('parent', $child->id)->orderBy('id', 'asc')->get();
                return $child;
            });
            return $item;
        });

        $struktur = PolaRuang::where('parent', 0)->where('category','struktur-ruang')->orderBy('id', 'asc')->get();
        $struktur->map(function ($item) {
            $item->children = PolaRuang::where('parent', $item->id)->orderBy('id', 'asc')->get();
            $item->children->map(function ($child) {
                $child->children = PolaRuang::where('parent', $child->id)->orderBy('id', 'asc')->get();
                return $child;
            });
            return $item;
        });

        $ketentuan = PolaRuang::where('parent', 0)->where('category','ketentuan-khusus')->orderBy('id', 'asc')->get();
        $ketentuan->map(function ($item) {
            $item->children = PolaRuang::where('parent', $item->id)->orderBy('id', 'asc')->get();
            $item->children->map(function ($child) {
                $child->children = PolaRuang::where('parent', $child->id)->orderBy('id', 'asc')->get();
                return $child;
            });
            return $item;
        });

        return view('pages.index', compact('disclaimer', 'provinsi', 'kabupaten', 'kecamatan', 'polaruang', 'struktur', 'ketentuan'));
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
            ->orderBy('kecamatan.nama', 'asc')
            ->get();
        // convert from capital to ucwords
        foreach ($datas as $data) {
            $data->nama = ucwords(strtolower($data->nama));
            $data->kabupaten = ucwords(strtolower($data->kabupaten));
        }
        return response()->json($datas);
    }
}
