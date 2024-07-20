@extends('layouts.app')

@section('content')                 
<!-- Form Edit Pola Ruang -->
<div class="card">
    <div class="card-header">{{ __('Edit Data Pola Ruang') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ url('admin/polaruang/'.$polaruang->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">{{ __('Pola Ruang') }}</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $polaruang->nama }}" readonly>
            </div>
            <div class="mb-3">
                <label for="parent" class="form-label">{{ __('Parent') }}</label>
                <select class="form-select" id="parent" name="parent">
                    <option value="0">Pilih Parent</option>
                    @foreach ($parents as $parent)
                        <option value="{{ $parent->id }}" @if($polaruang->parent == $parent->id) selected @endif>{{ $parent->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">{{ __('Category') }}</label>
                <br />
                <!-- Radio Category Inline (Struktur Ruang, Pola Ruang, Ketentuan Khusus)-->
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="category" id="struktur-ruang" value="struktur-ruang" @if($polaruang->category == 'struktur-ruang') checked @endif>
                    <label class="form-check-label" for="struktur-ruang">Rencana Struktur Ruang</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="category" id="pola-ruang" value="pola-ruang" @if($polaruang->category == 'pola-ruang') checked @endif>
                    <label class="form-check-label" for="pola-ruang">Rencana Pola Ruang</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="category" id="ketentuan-khusus" value="ketentuan-khusus" @if($polaruang->category == 'ketentuan-khusus') checked @endif>
                    <label class="form-check-label" for="ketentuan-khusus">Ketentuan Khusus</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="jsonfile" class="form-label">{{ __('File Json') }}</label>
                {{-- <input type="text" class="form-control" id="jsonfile" name="jsonfile" value="{{ $polaruang->jsonfile }}"> --}}
                <!-- File Json Upload -->
                <input type="file" class="form-control" id="jsonfile" name="jsonfile">
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </form>
    </div>
</div>
@endsection