@extends('layouts.mainAdmin')

@section('title', 'Data Pengaduan')
@section('content')

<div class="container mt-4">
    <h2 class="my-2 text-primary fw-bold">Daftar Pengaduan</h2>
    
    <!-- Deskripsi Halaman -->
    <div class="">
        <p>Halaman ini menampilkan daftar pengaduan yang telah diterima. Anda dapat melihat rincian pengaduan, serta menghapus pengaduan yang sudah diproses atau tidak relevan. Setiap pengaduan mencakup informasi nama, telepon, kategori, dan tanggal pembuatan.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th>Nama</th>
                <th>Telepon</th>
                <th>Kategori</th>
                <th>Dibuat</th>
                <th style="width:140px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengaduans as $pengaduan)
            <tr>
                <td>{{ $pengaduan->nama }}</td>
                <td>{{ $pengaduan->telepon }}</td>
                <td>{{ ucfirst($pengaduan->kategori) }}</td>
                <td>{{ $pengaduan->created_at->format('d M Y') }}</td>
                <td class="text-center">
                    <a href="{{ route('admin.pengaduan.show', $pengaduan->id) }}"
                       class="btn btn-info btn-sm w-100 mb-2">
                        <i class="bi bi-eye"></i> Preview
                    </a>
                    <button class="btn btn-danger btn-sm w-100"
                            data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal"
                            data-action="{{ route('admin.pengaduan.destroy', $pengaduan->id) }}"
                            data-name="{{ $pengaduan->nama }}">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Belum ada pengaduan.</td>
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
          Apakah Anda yakin ingin menghapus pengaduan dari  
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

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('confirmDeleteModal');
    modal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget;
      var action = button.getAttribute('data-action');
      var name   = button.getAttribute('data-name');

      // Setel action URL form dan tampilkan nama
      document.getElementById('deleteForm').action = action;
      document.getElementById('deleteItemName').textContent = name;
    });
  });
</script>

@endsection
