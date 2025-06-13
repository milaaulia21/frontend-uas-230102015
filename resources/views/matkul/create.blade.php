@extends('layouts.app')

@section('title', 'Tambah Mata Kuliah')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Tambah Data Mata Kuliah</h3>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('matkul.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="kode_matkul">Kode Matkul</label>
                    <input type="text" class="form-control @error('kode_matkul') is-invalid @enderror"
                           id="kode_matkul" name="kode_matkul" value="{{ old('kode_matkul') }}" required>
                    @error('kode_matkul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama_matkul">Nama Matkul</label>
                    <input type="text" class="form-control @error('nama_matkul') is-invalid @enderror"
                           id="nama_matkul" name="nama_matkul" value="{{ old('nama_matkul') }}" required>
                    @error('nama_matkul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sks">SKS</label>
                    <input type="number" class="form-control @error('sks') is-invalid @enderror"
                           id="sks" name="sks" value="{{ old('sks') }}" min="1" max="6" required>
                    @error('sks')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('matkul.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
