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
                <input type="text" class="form-control" id="parent" name="parent" value="{{ $polaruang->parent }}" readonly>
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