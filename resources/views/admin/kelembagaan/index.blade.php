@extends('layouts.mainAdmin')

@section('title', 'Kelembagaan')

@section('content')
<div class="container mt-4">
    <h2 class="text-primary fw-bold">Data Kelembagaan</h2>
    <p class="text-justify mb-3" style="font-size: 1rem; color: #555;">Halaman Kelembagaan digunakan untuk memberikan pengalaman pengguna yang lebih rapi dan intuitif dalam mengelola data kelembagaan.</p>
    
    <!-- Tombol untuk menambah kelembagaan baru -->
    <a href="{{ route('admin.kelembagaan.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Kelembagaan
    </a>

    <!-- Pesan sukses jika ada aksi berhasil -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel untuk menampilkan data kelembagaan -->
    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nama Kelembagaan</th>
                <th>Kegunaan</th>
                <th>Bagan Struktur</th>
                <th style="width: 140px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kelembagaan as $item)
            <tr>
                <td>{{ $item->nama_kelembagaan }}</td>
                <td>{{ Str::limit($item->kegunaan, 50) }}</td>
                <td class="text-center">
                    @if($item->gambar_bagan_struktur)
                        <!-- Gambar yang bisa diklik untuk melihat full -->
                        <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal" data-img="{{ asset('storage/' . $item->gambar_bagan_struktur) }}">
                            <img src="{{ asset('storage/' . $item->gambar_bagan_struktur) }}" width="80">
                        </a>
                    @else
                        <span class="text-muted">–</span>
                    @endif
                </td>
                <td class="text-center">
                    <!-- Tombol untuk Edit -->
                    <a href="{{ route('admin.kelembagaan.edit', $item->id) }}" class="btn btn-sm btn-warning w-100 mb-2">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    
                    <!-- Tombol untuk Hapus dengan konfirmasi -->
                    <button class="btn btn-sm btn-danger w-100"
                            data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal"
                            data-action="{{ route('admin.kelembagaan.destroy', $item->id) }}"
                            data-name="{{ $item->nama_kelembagaan }}">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">Belum ada data kelembagaan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="deleteForm" method="POST" action="">
        @csrf
        @method('DELETE')
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin ingin menghapus kelembagaan 
          <strong><span id="deleteItemName"></span></strong>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal untuk Menampilkan Gambar Bagan dalam Ukuran Penuh -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Bagan Struktur Organisasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img id="fullImage" src="" class="img-fluid" alt="Bagan Struktur">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Script untuk Menghandle Modal Gambar -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var imageModal = document.getElementById('imageModal');
    imageModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget;
      var imgSrc = button.getAttribute('data-img'); // Ambil sumber gambar

      // Set gambar ke modal
      var fullImage = document.getElementById('fullImage');
      fullImage.src = imgSrc;
    });

    var confirmDeleteModal = document.getElementById('confirmDeleteModal');
    confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget;
      var action = button.getAttribute('data-action');
      var name = button.getAttribute('data-name');

      // Set form action ke route destroy (DELETE /admin/kelembagaan/{id})
      document.getElementById('deleteForm').action = action;
      // Tampilkan nama item di modal
      document.getElementById('deleteItemName').textContent = name;
    });
  });
</script>

@endsection
