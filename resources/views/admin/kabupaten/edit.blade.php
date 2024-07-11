@extends('layouts.app')

@section('content')                 
<!-- Form Edit Kabupaten -->
<div class="card">
    <div class="card-header">{{ __('Edit Data Kabupaten') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ url('admin/kabupaten/'.$kabupaten->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">{{ __('Kabupaten') }}</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $kabupaten->nama }}" readonly>
            </div>
            <div class="mb-3">
                <label for="jsonfile" class="form-label">{{ __('File Json') }}</label>
                {{-- <input type="text" class="form-control" id="jsonfile" name="jsonfile" value="{{ $kabupaten->jsonfile }}"> --}}
                <!-- File Json Upload -->
                <input type="file" class="form-control" id="jsonfile" name="jsonfile">
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </form>
    </div>
</div>
@endsection