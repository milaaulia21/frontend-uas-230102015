@extends('layouts.app')

@section('title', 'Edit Mata Kuliah')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Edit Data Mata Kuliah</h3>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('matkul.update', $data['kode_matkul']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="kode_matkul">Kode Matkul</label>
                    <input type="text" class="form-control" id="kode_matkul" name="kode_matkul"
                           value="{{ $data['kode_matkul'] }}" readonly>
                </div>

                <div class="form-group">
                    <label for="nama_matkul">Nama Matkul</label>
                    <input type="text" class="form-control @error('nama_matkul') is-invalid @enderror"
                           id="nama_matkul" name="nama_matkul" value="{{ old('nama_matkul', $data['nama_matkul']) }}" required>
                    @error('nama_matkul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="sks">SKS</label>
                    <input type="number" class="form-control @error('sks') is-invalid @enderror"
                           id="sks" name="sks" value="{{ old('sks', $data['sks']) }}" min="1" max="6" required>
                    @error('sks')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('matkul.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
