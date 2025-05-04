<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KataSambutan;

class KataSambutanController extends Controller
{
    public function index()
    {
        $data = KataSambutan::all();
        return view('admin.sambutan.index', compact('data'));
    }

    public function show($id)
    {
        $data = KataSambutan::findOrFail($id);
        return view('admin.sambutan.show', compact('data'));
    }

    public function edit($id)
    {
        $data = KataSambutan::findOrFail($id);
        return view('admin.sambutan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:60',
            'isi' => 'required|string',
        ]);

        $data = KataSambutan::findOrFail($id);
        $data->update($request->all('judul', 'isi'));

        return redirect()->route('admin.katasambutan.index')->with('success', 'Data berhasil diperbarui.');
    }
}