<?php

namespace App\Http\Controllers;

use App\Models\PolaRuang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PolaRuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.polaruang.index');
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
        $datas = PolaRuang::with('parentname')->get();

        $array = [];
        // foreach with parent name from PolaRuang model
        foreach ($datas as $data) {
            if($data->updated_at == null) {
                $updated_at = '-';
            } else {
                $updated_at = $data->updated_at->format('d-m-Y H:i:s');
            }
            $array[] = [
                'id' => $data->id,
                'nama' => $data->nama,
                'parent' => @$data->parentname->nama ?? '-',
                'jsonfile' => $data->jsonfile,
                'category' => $data->category,
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
        $polaruang = PolaRuang::find($id);
        $parents = PolaRuang::where('parent', 0)->get();
        return view('admin.polaruang.edit', compact('polaruang', 'parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = PolaRuang::find($id);
        $update->nama = $request->nama;
        $update->parent = $request->parent;
        $update->category = $request->category;
        if ($request->hasFile('jsonfile')) {
            $file = $request->file('jsonfile');
            $filename = $file->getClientOriginalName();
            $file->move('jsonfile', $filename);
            $update->jsonfile = $filename;
        }
        $update->save();
        return redirect('admin/polaruang')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showApi(string $id)
    {
        try{
            $data = PolaRuang::find($id);
            $array = [];
            // foreach with parent name from PolaRuang model
            if($data->updated_at == null) {
                $updated_at = '-';
            } else {
                $updated_at = $data->updated_at->format('d-m-Y H:i:s');
            }
            $array[] = [
                'id' => $data->id,
                'nama' => $data->nama,
                'parent' => @$data->parentname->nama ?? '-',
                'jsonfile' => $data->jsonfile,
                'category' => $data->category,
                'created_at' => $data->created_at->format('d-m-Y H:i:s'),
                'updated_at' => $updated_at,
            ];
            
            return DataTables::of($array)->make(true);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
