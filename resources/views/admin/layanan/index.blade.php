@extends('layouts.mainAdmin')

@section('title', 'Kelola Layanan')

@section('content')
<div class="container mt-4">
    <h2 class=" text-primary fw-bold">Data Layanan</h2>
    <p class=" text-justify mb-3" style="font-size: 1rem; color: #555;">Halaman administratif yang digunakan untuk mengelola data layanan yang tersedia. Pada halaman ini, administrator dapat melakukan berbagai tindakan terkait layanan yang disediakan oleh sistem.</p>
    <a href="{{ route('admin.layanan.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-circle"></i> Tambah Layanan
    </a>

    @if(session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Layanan</th>
                    <th>Syarat</th>
                    <th class="text-center" style="width: 180px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($layanans as $layanan)
                    <tr>
                        <td>{{ $layanan->judul }}</td>
                        <td>{{ Str::limit(strip_tags($layanan->syarat), 50) }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.layanan.show', $layanan->id) }}"
                                   class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Preview Layanan">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <button class="btn btn-sm btn-danger" 
                                        data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal"
                                        data-action="{{ route('admin.layanan.destroy', $layanan->id) }}"
                                        data-name="{{ $layanan->judul }}"
                                        data-bs-toggle="tooltip" title="Hapus Layanan">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">Belum ada data layanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus layanan <strong><span id="deleteItemName"></span></strong>?
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
        var confirmDeleteModal = document.getElementById('confirmDeleteModal');
        confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var action = button.getAttribute('data-action');
            var name   = button.getAttribute('data-name');

            document.getElementById('deleteForm').action = action;
            document.getElementById('deleteItemName').textContent = name;
        });

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection
