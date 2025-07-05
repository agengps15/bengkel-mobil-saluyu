<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Bengkel Saluyu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #ff914d 0%, #f43f5e 100%);
            min-height: 100vh;
        }
        .register-card {
            max-width: 410px;
            margin: 48px auto;
            border-radius: 20px;
            box-shadow: 0 6px 32px rgba(0,0,0,0.12);
            background: rgba(255,255,255,0.97);
            padding: 2.2rem 2rem 2rem;
        }
        .form-title {
            color: #d90429;
            font-weight: 700;
            font-size: 1.25rem;
        }
        .gradient-btn {
            background: linear-gradient(90deg, #ff914d 60%, #f43f5e 100%);
            border: none;
            font-weight: 600;
        }
        .gradient-btn:hover {
            background: linear-gradient(90deg, #f43f5e 60%, #ff914d 100%);
        }
    </style>
</head>
<body>
    <div class="register-card">
        <div class="text-center mb-4">
            <div class="form-title mb-2">🔥 Daftar Dulu Yuk!</div>
            <div class="mb-2" style="color:#333;">Isi datanya, gratis dan cepat <span>✍️</span></div>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="regPassword" required minlength="8" autocomplete="new-password">
                    <button class="btn btn-outline-secondary" type="button" onclick="toggleRegisterPassword()" tabindex="-1">
                        <span id="regEye" class="bi bi-eye"></span>
                    </button>
                </div>
                {{-- <div class="text-warning small mt-1">Password min. 8 karakter, wajib 1 angka &amp; 1 huruf besar.</div> --}}
                @error('password')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Konfirmasi Password</label>
                <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn gradient-btn w-100 mb-2">🔥 Daftar Sekarang!</button>
        </form>
        <div class="mt-2 text-center small">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="fw-semibold text-danger">Login di sini</a>
        </div>
    </div>
    <script>
        function toggleRegisterPassword() {
            var x = document.getElementById("regPassword");
            var eye = document.getElementById("regEye");
            if (x.type === "password") {
                x.type = "text";
                eye.classList.remove("bi-eye");
                eye.classList.add("bi-eye-slash");
            } else {
                x.type = "password";
                eye.classList.add("bi-eye");
                eye.classList.remove("bi-eye-slash");
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>
</html>
