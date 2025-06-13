<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;

// Halaman awal diarahkan ke Dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

// Routes Mahasiswa (CRUD)
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

// Routes Matkul (CRUD)
Route::get('/matkul', [MatkulController::class, 'index'])->name('matkul.index');
Route::get('/matkul/create', [MatkulController::class, 'create'])->name('matkul.create');
Route::post('/matkul', [MatkulController::class, 'store'])->name('matkul.store');
Route::get('/matkul/{id}/edit', [MatkulController::class, 'edit'])->name('matkul.edit');
Route::put('/matkul/{id}', [MatkulController::class, 'update'])->name('matkul.update');
Route::delete('/matkul/{id}', [MatkulController::class, 'destroy'])->name('matkul.destroy');
