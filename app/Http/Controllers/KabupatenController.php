<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.kabupaten.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datas = Kabupaten::join('provinsi', 'kabupaten.provinsi_id', '=', 'provinsi.id')
            ->select('kabupaten.*', 'provinsi.nama as provinsi')
            ->get();
        
        $array = [];
        foreach ($datas as $data) {
            if($data->updated_at == null) {
                $updated_at = '-';
            } else {
                $updated_at = $data->updated_at->format('d-m-Y H:i:s');
            }
            $array[] = [
                'id' => $data->id,
                'nama' => $data->nama,
                'provinsi' => $data->provinsi,
                'kordinat' => $data->kordinat,
                'jsonfile' => $data->jsonfile,
                'created_at' => $data->created_at->format('d-m-Y H:i:s'),
                'updated_at' => $updated_at,
            ];
        }
        return DataTables::of($array)->make(true);  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kabupaten = Kabupaten::find($id);
        return view('admin.kabupaten.edit', ['kabupaten' => $kabupaten]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Kabupaten::find($id);
        $update->nama = $request->nama;
        // $update->jsonfile = $request->jsonfile;
        // Upload file
        if ($request->hasFile('jsonfile')) {
            $file = $request->file('jsonfile');
            $filename = $file->getClientOriginalName();
            $file->move('jsonfile', $filename);
            $update->jsonfile = $filename;
        }
        $update->save();
        return redirect('admin/kabupaten')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
