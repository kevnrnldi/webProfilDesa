@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-light">
        <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
            <h3 class="mb-0 text-primary fw-bold">Struktur Organisasi Kelurahan</h3>
            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addImageModal">
                <i class="bi bi-plus-circle"></i> Tambah Gambar
            </button>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>Gambar Struktur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $item)
                            <tr>
                                <td>
                                    <img src="{{ url('storage/' . $item->gambar) }}" alt="Struktur Organisasi"
                                         class="img-fluid rounded border shadow-sm" style="max-width: 100%; max-height: 300px;">
                                </td>
                                <td>
                                    <button class="btn btn-outline-danger btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#confirmDeleteModal"
                                            data-action="{{ route('admin.struktur.destroy', $item->id) }}">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-muted">Data belum diisi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Upload Gambar -->
    <div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title text-primary" id="addImageModalLabel">Upload Gambar Struktur Organisasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <form action="{{ route('admin.struktur.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Pilih Gambar Struktur</label>
                            <input type="file" name="gambar" class="form-control" accept="image/*" required>
                            @error('gambar')
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Unggah</button>
                    </div>
                </form>
            </div>
        </div>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus gambar struktur ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script Modal Delete -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteModal = document.getElementById('confirmDeleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const action = button.getAttribute('data-action');
            const form = document.getElementById('deleteForm');
            form.action = action;
        });
    });
</script>
@endsection
