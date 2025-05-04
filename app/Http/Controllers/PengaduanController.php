<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function create()
    {
        return view('User.pengaduan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:60',
            'telepon' => 'required|string|max:30',
            'kategori' => 'required|string',
            'isi' => 'required|string',
            'lampiran' => 'nullable|file|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('lampiran')) {
            $path = $request->file('lampiran')->store('lampiran_pengaduan', 'public');
        }

        Pengaduan::create([
            'nama' => $request->nama,
            'telepon' => $request->telepon,
            'kategori' => $request->kategori,
            'isi' => $request->isi,
            'lampiran' => $path,
        ]);

        return redirect()->route('pengaduan.create')->with('success', 'Pengaduan Anda telah dikirim.');
    }


   

        public function index()
        {
            $pengaduans = Pengaduan::latest()->get();
            return view('admin.pengaduan.index', compact('pengaduans'));
        }

        public function show($id)
        {
            $pengaduan = Pengaduan::findOrFail($id);
            return view('admin.pengaduan.show', compact('pengaduan'));
        }

        public function destroy($id)
        {
            $pengaduan = Pengaduan::findOrFail($id);

            // Hapus file lampiran jika ada
            if ($pengaduan->lampiran) {
                Storage::delete($pengaduan->lampiran);
            }

            $pengaduan->delete();

            return redirect()->route('admin.pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
        }

}

