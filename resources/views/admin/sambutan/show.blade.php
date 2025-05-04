@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">{{ $data->judul }}</h4>
        </div>
        <div class="card-body">
            <p class="text-justify">{!! nl2br(e($data->isi)) !!}</p>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.katasambutan.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('admin.katasambutan.edit', $data->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
