@extends('layouts.mainAdmin')

@section('content')
<div class="container">
    <h1 class="my-3 text-primary fw-bold">Kelola Akun</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.akun.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Akun
    </a>

    <table class="table table-striped table-bordered">
        <thead class="table-light">
            <tr>
                <th style="width: 50px">No</th>
                <th>Nama</th>
                <th>Email</th>
                <th style="width: 140px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-center">
                    <a href="{{ route('admin.akun.edit', $user) }}"
                       class="btn btn-sm btn-primary w-100 mb-2">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <button class="btn btn-sm btn-danger w-100"
                            data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal"
                            data-action="{{ route('admin.akun.destroy', $user) }}"
                            data-name="{{ $user->name }}">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">Belum ada akun.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Konfirmasi Hapus Akun -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="deleteForm" method="POST" action="">
        @csrf
        @method('DELETE')
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus Akun</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Apakah Anda yakin ingin menghapus akun 
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
  modal.addEventListener('show.bs.modal', function (e) {
    var button = e.relatedTarget;
    var action = button.getAttribute('data-action');
    var name   = button.getAttribute('data-name');
    document.getElementById('deleteForm').action = action;
    document.getElementById('deleteItemName').textContent = name;
  });
});
</script>
@endsection
