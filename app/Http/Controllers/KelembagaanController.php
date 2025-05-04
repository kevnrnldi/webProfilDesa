<?php

namespace App\Http\Controllers;

use App\Models\Kelembagaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelembagaanController extends Controller
{
    public function index()
    {
        $kelembagaan = Kelembagaan::all();
        return view('admin.kelembagaan.index', compact('kelembagaan'));
    }

    public function create()
    {
        return view('admin.kelembagaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelembagaan' => 'required|string|max:60',
            'kegunaan' => 'required|string',
            'gambar_bagan_struktur' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambar_bagan_struktur = null;
        if ($request->hasFile('gambar_bagan_struktur')) {
            $gambar_bagan_struktur = $request->file('gambar_bagan_struktur')->store('images', 'public');
        }

        Kelembagaan::create([
            'nama_kelembagaan' => $request->nama_kelembagaan,
            'kegunaan' => $request->kegunaan,
            'gambar_bagan_struktur' => $gambar_bagan_struktur,
        ]);

        return redirect()->route('admin.kelembagaan.index')->with('success', 'Data kelembagaan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kelembagaan = Kelembagaan::findOrFail($id);
        return view('admin.kelembagaan.edit', compact('kelembagaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelembagaan' => 'required|string|max:60',
            'kegunaan' => 'required|string',
            'gambar_bagan_struktur' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $kelembagaan = Kelembagaan::findOrFail($id);
        $gambar_bagan_struktur = $kelembagaan->gambar_bagan_struktur;

        if ($request->hasFile('gambar_bagan_struktur')) {
            // Hapus gambar lama
            if ($gambar_bagan_struktur) {
                Storage::delete('public/' . $gambar_bagan_struktur);
            }
            // Upload gambar baru
            $gambar_bagan_struktur = $request->file('gambar_bagan_struktur')->store('images', 'public');
        }

        $kelembagaan->update([
            'nama_kelembagaan' => $request->nama_kelembagaan,
            'kegunaan' => $request->kegunaan,
            'gambar_bagan_struktur' => $gambar_bagan_struktur,
        ]);

        return redirect()->route('admin.kelembagaan.index')->with('success', 'Data kelembagaan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kelembagaan = Kelembagaan::findOrFail($id);
        if ($kelembagaan->gambar_bagan_struktur) {
            Storage::delete('public/' . $kelembagaan->gambar_bagan_struktur);
        }
        $kelembagaan->delete();

        return redirect()->route('admin.kelembagaan.index')->with('success', 'Data kelembagaan berhasil dihapus');
    }
}
