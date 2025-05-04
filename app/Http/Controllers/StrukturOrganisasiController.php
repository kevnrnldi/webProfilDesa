<?php

namespace App\Http\Controllers;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class StrukturOrganisasiController extends Controller
{
    

public function index() {
    $data = StrukturOrganisasi::all();
    return view('admin.struktur.index', compact('data'));
}

public function store(Request $request)
{
    // Validasi file gambar
    $request->validate([
        'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048', // validasi: hanya gambar (jpg, jpeg, png) dan ukuran maksimum 2MB
    ], [
        'gambar.required' => 'Gambar struktur organisasi harus diunggah.',
        'gambar.image' => 'File yang diunggah harus berupa gambar.',
        'gambar.mimes' => 'File yang diunggah harus memiliki ekstensi .jpg, .jpeg, atau .png.',
        'gambar.max' => 'Ukuran file gambar tidak boleh lebih dari 2MB.',
    ]);

    // Hapus data lama jika ada
    $oldData = StrukturOrganisasi::first();
    if ($oldData) {
        if ($oldData->gambar && Storage::disk('public')->exists($oldData->gambar)) {
            Storage::disk('public')->delete($oldData->gambar);
        }
        $oldData->delete();
    }

    // Simpan gambar baru
    $path = $request->file('gambar')->store('struktur', 'public');
    StrukturOrganisasi::create(['gambar' => $path]);

    return redirect()->back()->with('success', 'Gambar berhasil disimpan.');
}







public function destroy($id) {
    $data = StrukturOrganisasi::findOrFail($id);
    if ($data->gambar) {
        Storage::delete('public/' . $data->gambar);
    }
    $data->delete();
    return redirect()->back()->with('success', 'Struktur berhasil dihapus.');
}

}
