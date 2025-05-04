<?php
namespace App\Http\Controllers;
use App\Models\DemografiPenduduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DemografiController extends Controller
{
    // Menampilkan data di halaman Admin
    public function index()
    {
        $data = DemografiPenduduk::all();
        return view('admin.demografi.index', compact('data'));
    }

    // Menampilkan form untuk menambah data
    public function create()
    {
        return view('admin.demografi.create');
    }

    // Menyimpan data yang baru
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:60',
            'subkategori' => 'required|string|max:60',
            'jumlah' => 'required|integer',
        ]);

            // Cek apakah subkategori untuk kategori yang sama sudah ada
        $exists = DemografiPenduduk::where('kategori', $request->kategori)
        ->where('subkategori', $request->subkategori)
        ->exists();

    if ($exists) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Subkategori ini sudah pernah dimasukkan!');
    }
        

        DemografiPenduduk::create($request->all());

        return redirect()->route('admin.demografi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $data = DemografiPenduduk::findOrFail($id);
        return view('admin.demografi.edit', compact('data'));
    }

    // Mengupdate data yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required|string|max:60',
            'subkategori' => 'required|string|max:60',
            'jumlah' => 'required|integer',
        ]);

        $data = DemografiPenduduk::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('admin.demografi.index')->with('success', 'Data berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy($id)
    {
        DemografiPenduduk::destroy($id);
        return redirect()->route('admin.demografi.index')->with('success', 'Data berhasil dihapus.');
    }

    // Menampilkan data berdasarkan kategori
        public function editByKategori($kategori)
    {
        $data = DemografiPenduduk::where('kategori', $kategori)->get();
        return view('admin.demografi.edit_kategori', compact('data', 'kategori'));
    }

    // Mengupdate data berdasarkan kategori
    public function updateByKategori(Request $request, $kategori)
{
    foreach ($request->input('id') as $index => $id) {
        $item = DemografiPenduduk::find($id);
        if ($item && $item->kategori == $kategori) {
            $item->jumlah = $request->input('jumlah')[$index];
            $item->save();
        }
    }

    return redirect()->route('admin.demografi.index')->with('success', 'Data berhasil diperbarui.');
}

}
