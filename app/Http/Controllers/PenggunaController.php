<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pengguna.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('admin/pengguna')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datas = User::all();
        $array = [];
        foreach ($datas as $data) {
            if($data->updated_at == null) {
                $updated_at = '-';
            } else {
                $updated_at = $data->updated_at->format('d-m-Y H:i:s');
            }
            $array[] = [
                'id' => $data->id,
                'name' => $data->name,
                'email' => $data->email,
                'created_at' => $data->created_at->format('d F Y H:i:s'),
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
        $pengguna = User::find($id);
        return view('admin.pengguna.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->password != null) {
            $data->password = bcrypt($request->password);
        }
        $data->updated_at = now();
        $data->save();
        return redirect('admin/pengguna')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find($id);
        $data->delete();
        // return redirect('admin/pengguna')->with('success', 'Data berhasil dihapus');
    }
}
