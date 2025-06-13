<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8080/mahasiswa');
        if ($response->successful()) {
            $data = $response->json();
            return view('mahasiswa.index', ['datas' => $data]);
        }
        return response()->json(['error' => 'Gagal mengambil data mahasiswa'], 500);
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required',
            'nama_mahasiswa' => 'required',
            'email' => 'required|email',
        ]);

        $response = Http::post('http://localhost:8080/mahasiswa', [
            'npm' => $request->npm,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'email' => $request->email,
        ]);

        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
        }

        return back()->with('error', 'Gagal menambahkan data mahasiswa.');
    }

    public function edit(string $id)
    {
        $response = Http::get('http://localhost:8080/mahasiswa/' . $id);
        if ($response->successful()) {
            $data = $response->json();
            return view('mahasiswa.edit', ['data' => $data]);
        }
        return response()->json(['error' => 'Gagal mengambil data mahasiswa'], 500);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'npm' => 'required',
            'nama_mahasiswa' => 'required',
            'email' => 'required|email',
        ]);

        $response = Http::put('http://localhost:8080/mahasiswa/' . $id, $validated);

        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui.');
        }

        return back()->with('error', 'Gagal memperbarui data mahasiswa.');
    }

    public function destroy(string $id)
    {
        $response = Http::delete('http://localhost:8080/mahasiswa/' . $id);

        if ($response->successful()) {
            return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus data mahasiswa.');
    }
}
