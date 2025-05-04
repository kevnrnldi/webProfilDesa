@extends('layouts.mainAdmin')

@section('title', 'Visi dan Misi Admin')
@section('link')
<link rel="stylesheet" href="{{ asset('asset/style/admin/visimisi.css') }}">
@endsection

@section('content')
<div class="container mt-4">
    <h2 class="mb-2 fw-bold text-primary">Visi dan Misi</h2>

    <p class=" text-justify mb-4" style="font-size: 1rem; color: #555;">
        Halaman ini memuat visi dan misi sebagai dasar perencanaan dan pengambilan keputusan pembangunan kelurahan. 
        Visi menggambarkan tujuan jangka panjang, sedangkan misi berfokus pada langkah-langkah konkret yang harus diambil untuk mencapainya.
    </p>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Visi</th>
                <th>Misi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $item)
            <tr>
                <td>Visi dan Misi Lurah Lempuing</td>
                <td>{{ Str::limit($item->visi, 80) }}</td>
                <td>{{ Str::limit($item->misi, 80) }}</td>
                <td>
                    <a href="{{ route('admin.visimisi.preview', $item->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-eye"></i> Detail
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data visi dan misi yang tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
