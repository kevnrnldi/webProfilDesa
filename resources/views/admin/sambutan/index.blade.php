@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-light">
        <div class="card-header bg-light">
            <h3 class="mb-2 text-primary fw-bold"><i class="bi bi-chat-quote-fill me-2"></i>Kata Sambutan</h3>
            <p class="lead text-justify " style="font-size: 1.1em; color: #555;">
               Halaman ini digunakan untuk menampilkan dan mengelola data kata sambutan dari lurah atau pejabat kelurahan yang dapat ditampilkan kepada masyarakat. 
            </p>
           
        </div>
        <div class="card-body">
            @if($data->isEmpty())
                <div class="alert alert-info">
                    Belum ada data kata sambutan yang tersedia.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Kata Sambutan (Preview)</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td class="fw-semibold text-primary">{{ $item->judul }}</td>
                                <td>{{ Str::limit($item->isi, 100) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.katasambutan.show', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-eye"></i> Lihat Selengkapnya
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
