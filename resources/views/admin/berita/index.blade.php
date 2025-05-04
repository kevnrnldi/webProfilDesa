@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-2">
    <!-- Judul dengan Deskripsi -->
    <h2 class="text-primary fw-bold">Daftar Berita Kelurahan</h2>
    <p class="text-justify mb-3" style="font-size: 1rem; color: #555;">Halaman ini berisi daftar berita terkini yang diterbitkan oleh kelurahan. Anda dapat menambah, melihat, atau menghapus berita sesuai kebutuhan.</p>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol untuk menambah berita baru -->
    <div class="mb-3">
        <a href="{{ route('berita.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Berita
        </a>
    </div>

    <!-- Tabel untuk menampilkan daftar berita -->
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Gambar</th>
                <th style="width: 160px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($berita as $item)
            <tr>
                <td>{{ $item->judul }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                <td>
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" width="100">
                    @else
                        <span class="text-muted">–</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('berita.show', $item->id) }}" class="btn btn-info btn-sm w-100 mb-2">
                        <i class="bi bi-eye"></i> Preview
                    </a>
                    <button
                        class="btn btn-danger btn-sm w-100"
                        data-bs-toggle="modal"
                        data-bs-target="#confirmDeleteModal"
                        data-action="{{ route('berita.destroy', $item->id) }}"
                        data-name="{{ $item->judul }}"
                    >
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">Belum ada berita.</td>
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
          Apakah Anda yakin ingin menghapus berita<br><strong><span id="deleteItemName"></span></strong>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Ya, Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  // Inline script untuk modal konfirmasi hapus
  document.addEventListener('DOMContentLoaded', function() {
    var confirmModal = document.getElementById('confirmDeleteModal');
    confirmModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget;
      var action = button.getAttribute('data-action');
      var name   = button.getAttribute('data-name');
      // Set action URL form
      document.getElementById('deleteForm').action = action;
      // Set nama item di modal
      document.getElementById('deleteItemName').textContent = name;
    });
  });
</script>

@endsection
