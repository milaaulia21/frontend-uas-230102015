<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MatkulController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:8080/matkul');
        if ($response->successful()) {
            $data = $response->json();
            return view('matkul.index', ['datas' => $data]);
        }
        return response()->json(['error' => 'Gagal mengambil data matkul'], 500);
    }

    public function create()
    {
        return view('matkul.input');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required|string|max:100',
            'sks' => 'required|numeric|min:1|max:6',
        ]);

        $response = Http::post('http://localhost:8080/matkul', [
            'kode_matkul' => $request->kode_matkul,
            'nama_matkul' => $request->nama_matkul,
            'sks' => $request->sks,
        ]);

        if ($response->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Data mata kuliah berhasil ditambahkan.');
        }

        return back()->with('error', 'Gagal menambahkan data mata kuliah.');
    }

    public function edit(string $id)
    {
        $response = Http::get('http://localhost:8080/matkul/' . $id);
        if ($response->successful()) {
            $data = $response->json();
            return view('matkul.edit', ['data' => $data]);
        }
        return response()->json(['error' => 'Gagal mengambil data mata kuliah'], 500);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required|string|max:100',
            'sks' => 'required|numeric|min:1|max:6',
        ]);

        $response = Http::put('http://localhost:8080/matkul/' . $id, $validated);

        if ($response->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Data mata kuliah berhasil diperbarui.');
        }

        return back()->with('error', 'Gagal memperbarui data mata kuliah.');
    }

    public function destroy(string $id)
    {
        $response = Http::delete('http://localhost:8080/matkul/' . $id);

        if ($response->successful()) {
            return redirect()->route('matkul.index')->with('success', 'Data mata kuliah berhasil dihapus.');
        }

        return back()->with('error', 'Gagal menghapus data mata kuliah.');
    }
}
