@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Disclaimer Popup') }}</div>
    <div class="card-body">              
        <!-- Form with textare and text editor -->
        <form action="{{ route('disclaimer.update', $disclaimer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                {{-- <label for="konten">Konten</label> --}}
                <textarea class="form-control" id="konten" name="konten" rows="3">{{ $disclaimer->konten }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    tinymce.init({
        selector: '#konten',
        height: 600,
    });
</script>
@endsection