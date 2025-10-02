<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(to right, #dfe9f3, #ffffff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 420px;
        }

        .login-card h3 {
            font-weight: 700;
            color: #0d6efd;
            text-align: center;
            margin-bottom: 10px;
        }

        .login-card p {
            color: #6c757d;
            text-align: center;
            font-size: 0.95rem;
            margin-bottom: 25px;
        }

        .form-label {
            font-weight: 500;
        }

        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 12px 12px 12px;
            font-size: 1rem;
            border: 1px solid #ced4da;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.25);
        }

        .form-icon {
            position: absolute;
            top: 50%;
            left: 12px;
            transform: translateY(-50%);
            color: #adb5bd;
            transition: color 0.3s ease, transform 0.3s ease;
            font-size: 1.1rem;
        }

        .form-control:focus + .form-icon {
            color: #0d6efd;
            transform: translateY(-50%) scale(1.1);
        }

        .btn-custom {
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            font-size: 1rem;
        }

        .alert-danger {
            font-size: 0.875rem;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container login-wrapper">
    <div class="login-card">
        <h3><i class="bi bi-shield-lock-fill me-2"></i>Login Admin</h3>
        <p>Silakan masuk untuk mengelola konten dan data website kelurahan dengan aman.</p>

        <!-- Pesan error -->
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda" required autofocus>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-custom mb-3">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </button>
        </form>

        <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100 btn-custom">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
        </a>
    </div>
</div>
</body>
</html>
