@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Tambah Mahasiswa</h1>

    {{-- Error Message --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Ada beberapa masalah dengan input kamu:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="npm" class="form-label">NPM</label>
                    <input type="text" class="form-control" id="npm" name="npm" value="{{ old('npm') }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Mahasiswa</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
