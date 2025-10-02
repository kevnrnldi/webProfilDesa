@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-light">
        <div class="card-header bg-primary text-dark">
            <h4 class="mb-0 text-white">Visi dan Misi Lurah Lempuing</h4>
        </div>
        <div class="card-body">
            <h5 class="text-primary">Visi</h5>
            <p class="text-justify">{!! nl2br(e($data->visi)) !!}</p>

            <h5 class="text-primary mt-4">Misi</h5>
            <p class="text-justify">{!! nl2br(e($data->misi)) !!}</p>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.visimisi.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <a href="{{ route('admin.visimisi.edit', $data->id) }}" class="btn btn-outline-warning">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
