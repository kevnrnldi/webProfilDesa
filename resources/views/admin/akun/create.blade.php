@extends('layouts.mainAdmin')

@section('content')
<div class="container mt-4">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0">Tambah Akun Baru</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('admin.akun.store') }}" method="POST" id="accountForm">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input 
            type="text" 
            id="name"
            name="name" 
            class="form-control" 
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
            required
            placeholder="example@domain.com"
          >
          <div id="email-error" class="invalid-feedback" style="display:none;">
            Mohon masukkan email yang valid.
          </div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input 
            type="password" 
            id="password"
            name="password" 
            class="form-control" 
            required
            minlength="8"
            placeholder="Minimal 8 karakter"
          >
          <div id="password-error" class="invalid-feedback" style="display:none;">
            Password harus memiliki minimal 8 karakter.
          </div>
        </div>

        <div class="d-flex justify-content-between">
          <a href="{{ route('admin.akun.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
          </a>
          <button type="submit" class="btn btn-success">
            <i class="bi bi-check-circle"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
    // Menambahkan event listener untuk form submit
    document.getElementById('accountForm').addEventListener('submit', function(event) {
        let valid = true;

        // Validasi Email
        let email = document.getElementById('email');
        let emailError = document.getElementById('email-error');
        let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!email.value || !emailPattern.test(email.value)) {
            valid = false;
            email.classList.add('is-invalid');
            emailError.style.display = 'block';
        } else {
            email.classList.remove('is-invalid');
            emailError.style.display = 'none';
        }

        // Validasi Password
        let password = document.getElementById('password');
        let passwordError = document.getElementById('password-error');
        if (!password.value || password.value.length < 8) {
            valid = false;
            password.classList.add('is-invalid');
            passwordError.style.display = 'block';
        } else {
            password.classList.remove('is-invalid');
            passwordError.style.display = 'none';
        }

        // Jika ada error, jangan submit form
        if (!valid) {
            event.preventDefault();
        }
    });
</script>
@endsection
