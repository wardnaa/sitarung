@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Edit Data Pengguna') }}</div>
    <div class="card-body">
        <form method="POST" action="{{ route('pengguna.update', $pengguna->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">{{ __('Nama') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $pengguna->name }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $pengguna->email }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm">{{ __('Konfirmasi Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
        </form>
    </div>
</div>
@endsection