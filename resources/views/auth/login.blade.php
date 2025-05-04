<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Background dan Styling umum */
        body {
            background-color: #f4f7fa;
            font-family: Arial, sans-serif;
        }

        /* Styling Card */
        .login-card {
            
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        /* Header dalam card */
        .login-card h3 {
            font-size: 1.75rem;
            font-weight: bold;
            text-align: center;
            color: #007bff;
        }

        /* Styling Form Input */
        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 12px;
            font-size: 1rem;
            transition: border-color 0.3s ease-in-out;
        }

        /* Fokus input */
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Tombol */
        .btn-custom {
            border-radius: 8px;
            padding: 12px;
            font-size: 1.1rem;
            font-weight: bold;
        }

        /* Tombol Login */
        .btn-danger {
            background-color: #dc3545;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Tombol Kembali */
        .btn-secondary {
            background-color: #6c757d;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        /* Styling untuk pesan error */
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 5px;
            padding: 10px;
            font-size: 0.875rem;
        }

        /* Media Query untuk Responsivitas */
        @media (max-width: 767px) {
            .login-card {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="login-card">
                <h3>Login Admin</h3>
                
                <!-- Pesan error -->
                @if ($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                
                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan Email Anda" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                    </div>
                    <button type="submit" class="btn btn-danger w-100 btn-custom mb-3">Login</button>
                </form>
                <!-- Tombol Kembali -->
                <a href="{{ url()->previous() }}" class="btn btn-secondary w-100 btn-custom">Kembali</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
