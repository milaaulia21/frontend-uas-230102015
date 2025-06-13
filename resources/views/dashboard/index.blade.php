@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    {{-- Judul halaman --}}
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    @php
        use Carbon\Carbon;
        $tanggalHariIni = Carbon::now()->translatedFormat('l, d F Y');
    @endphp

    {{-- Tanggal hari ini --}}
    <p class="text-muted mb-4">
        <i class="fas fa-calendar-day"></i> Hari ini: {{ $tanggalHariIni }}
    </p>

    {{-- Kartu Mahasiswa --}}
    <div class="card shadow mb-4">
        <div class="card-body">
            <p>Kelola Mahasiswa</p>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary btn-sm">Data Mahasiswa</a>
        </div>
    </div>

    {{-- Kartu Mata Kuliah --}}
    <div class="card shadow mb-4">
        <div class="card-body">
            <p>Kelola Mata Kuliah</p>
            <a href="{{ route('matkul.index') }}" class="btn btn-primary btn-sm">Data Matkul</a>
        </div>
    </div>
@endsection
