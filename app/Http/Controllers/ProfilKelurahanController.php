<?php

namespace App\Http\Controllers;
use App\Models\VisiMisi;
use Illuminate\Http\Request;


class ProfilKelurahanController extends Controller
{
    public function index()
{
    $data = VisiMisi::all();
    return view('admin.visi-misi.index', compact('data'));
}

public function show($id)
{
    $data = VisiMisi::findOrFail($id);
    return view('admin.visi-misi.show', compact('data'));
}

public function edit($id)
{
    $data = VisiMisi::findOrFail($id);
    return view('admin.visi-misi.edit', compact('data'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'judul' => 'required|string|max:60',
        'visi' => 'required|string',
        'misi' => 'required|string',
    ]);

    $data = VisiMisi::findOrFail($id);
    $data->update([
        'judul' => $request->input('judul'),
        'visi' => $request->input('visi'),
        'misi' => $request->input('misi'),
    ]);

    return redirect()->route('admin.visimisi.index')->with('success', 'Data berhasil diperbarui.');
}

}
