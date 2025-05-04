<?php

namespace App\Http\Controllers;
use App\Models\Layanan;
use Illuminate\Http\Request;



class LayananController extends Controller
{
    // Untuk user
    public function index()
    {
        $layanans = Layanan::all();
        return view('admin.layanan.index', compact('layanans'));
    }
        public function show($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.show', compact('layanan'));
    }
    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'syarat' => 'required|string', 
        ]);
        

        Layanan::create($request->only(['judul', 'syarat']));
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:100',
            'syarat' => 'required|string', 
        ]);
        $layanan = Layanan::findOrFail($id);
        $layanan->update($request->only(['judul', 'syarat']));
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diupdate.');
    }

    public function destroy($id)
    {
        Layanan::destroy($id);
        return back()->with('success', 'Layanan dihapus.');
    }
}

