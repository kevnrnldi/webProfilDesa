@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0">Edit Akun</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.akun.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input 
            type="text" 
            id="name"
            name="name" 
            class="form-control" 
            value="{{ old('name', $user->name) }}" 
            required
          >
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input 
            type="email" 
            id="email"
            name="email" 
            class="form-control" 
            value="{{ old('email', $user->email) }}" 
            required
          >
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password (kosongkan jika tidak diganti)</label>
          <input 
            type="password" 
            id="password"
            name="password" 
            class="form-control"
          >
        </div>

        <div class="d-flex justify-content-between">
          <a href="{{ route('admin.akun.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
          </a>
          <button type="submit" class="btn btn-success">
            <i class="bi bi-check-circle"></i> Update
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
