@extends('layouts.mainAdmin')

@section('content')
<div class="container demografi">

    <div class="demografi-header mb-3">
        <h1 class="fw-bold text-primary">Pengelolaan Data Demografi</h1>
        <p class="text-muted">
            Halaman ini digunakan untuk mengelola data statistik penduduk seperti kelompok umur, pendidikan, pekerjaan, dan lainnya. Data ini penting sebagai dasar pengambilan kebijakan dan perencanaan pembangunan kelurahan.
        </p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
        $kategoriList = [
            'Kelompok Umur',
            'Pendidikan',
            'Pekerjaan',
            'Agama',
            'Perkawinan',
            'Jumlah Penduduk',
        ];
    @endphp

    @foreach($kategoriList as $kategori)
        <div class="demografi-section-header text-primary d-flex justify-content-between align-items-center mb-2">
            <h3 class="mb-0">{{ $kategori }}</h3>
            @if($kategori === 'Pekerjaan')
                <a href="{{ route('admin.demografi.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Pekerjaan
                </a>
            @else
                <a href="{{ route('admin.demografi.edit.kategori', $kategori) }}" class="btn btn-outline-secondary">
                    <i class="bi bi-pencil"></i> Edit Kategori
                </a>
            @endif
        </div>

        <table class="table table-striped table-bordered mb-5">
            <thead class="table-light">
                <tr>
                    <th>Subkategori</th>
                    <th>Jumlah</th>
                    @if($kategori === 'Pekerjaan')
                        <th style="width:150px">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php
                    $filtered = $data->where('kategori', $kategori);
                @endphp

                @forelse($filtered as $item)
                    <tr>
                        <td>{{ $item->subkategori }}</td>
                        <td>{{ number_format($item->jumlah) }}</td>
                        @if($kategori === 'Pekerjaan')
                            <td class="text-center">
                                <a href="{{ route('admin.demografi.edit', $item->id) }}" class="btn btn-sm btn-warning w-100 mb-2">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <button class="btn btn-sm btn-danger w-100"
                                        data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal"
                                        data-action="{{ route('admin.demografi.destroy', $item->id) }}"
                                        data-name="{{ $item->subkategori }}">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ $kategori === 'Pekerjaan' ? 3 : 2 }}" class="text-center text-muted">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @endforeach
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data <strong><span id="itemName"></span></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script untuk Modal -->
<script>
    var modal = document.getElementById('confirmDeleteModal');
    modal.addEventListener('show.bs.modal', function(e) {
        var btn = e.relatedTarget;
        var action = btn.getAttribute('data-action');
        var name = btn.getAttribute('data-name');
        document.getElementById('deleteForm').action = action;
        document.getElementById('itemName').textContent = name;
    });
</script>
@endsection
