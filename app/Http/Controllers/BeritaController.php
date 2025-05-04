<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);
        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();

        return redirect()->back()->with('success', 'Berita berhasil dihapus.');
    }

    public function show($id)
{
    $berita = Berita::findOrFail($id);
    return view('admin.berita.show', compact('berita'));
}

public function edit($id)
{
    $berita = Berita::findOrFail($id);
    return view('admin.berita.edit', compact('berita'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:100',
        'isi' => 'required|string',
        'tanggal' => 'required|date',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $berita = Berita::findOrFail($id);
    $data = $request->all();

    if ($request->hasFile('gambar')) {
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $data['gambar'] = $request->file('gambar')->store('berita', 'public');
    }

    $berita->update($data);

    return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
}



}

