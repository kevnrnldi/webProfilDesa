@extends('layouts.mainAdmin')

@section('title', 'Preview Layanan')

@section('content')
<div class="container mt-2">
    <h2 class="text-primary">{{ $layanan->judul }}</h2>
    <div class="border p-3 rounded mb-3">
        {!! $layanan->syarat !!}
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ route('admin.layanan.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
        <a href="{{ route('admin.layanan.edit', $layanan->id) }}" class="btn btn-warning">
            <i class="bi bi-pencil"></i> Edit
        </a> 
    </div>

</div>
@endsection
