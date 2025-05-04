<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function index()
    {
        $data = Pengumuman::all();
        return view('admin.pengumuman.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:60',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('gambar')->store('pengumuman', 'public');

        Pengumuman::create([
            'judul' => $request->judul,
            'gambar' => $path,
        ]);

        return redirect()->back()->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $data = Pengumuman::findOrFail($id);
        Storage::disk('public')->delete($data->gambar);
        $data->delete();
        return redirect()->back()->with('success', 'Pengumuman berhasil dihapus.');
    }
}
