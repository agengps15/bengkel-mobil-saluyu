<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Bengkel Saluyu</title>
    <!-- Bootstrap CDN untuk responsif & komponen -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(120deg, #ff914d 0%, #f43f5e 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }
        .login-card {
            max-width: 380px;
            border-radius: 22px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.16);
            background: rgba(255,255,255,0.93);
            padding: 2.2rem 2rem 2rem;
        }
        .login-title {
            color: #d90429;
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 1px;
            margin-bottom: 2px;
        }
        .desc {
            color: #444;
            font-size: 1rem;
            margin-bottom: 1.4rem;
        }
        .form-control {
            border-radius: 12px;
        }
        .btn-primary, .btn-tes {
            border-radius: 14px;
            font-weight: 600;
            font-size: 1.08rem;
        }
        .btn-google {
            background: #fff;
            color: #444;
            border: 1.5px solid #f43f5e;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-google:hover {
            background: #f8e4ea;
            color: #d90429;
        }
        .btn-primary {
            background: linear-gradient(90deg, #ff914d 60%, #f43f5e 100%);
            border: none;
        }
        .btn-tes {
            background: linear-gradient(90deg, #4903ed 20%, #f43f5e 100%);
            border: none;
            color:#fff
        }
        .btn-tes:hover {
            background: linear-gradient(90deg, #4903ed 20%, #f43f5e 100%);
            border: none;
            color:#fff
        }
        .small-link {
            color: #f43f5e;
            text-decoration: none;
            font-weight: 500;
            margin-left: 5px;
        }
        .captcha-box {
            background: #ffe6d5;
            color: #ae3c00;
            letter-spacing: 3px;
            font-size: 1.12rem;
            border-radius: 7px;
            padding: 4px 12px;
            margin-right: 10px;
            user-select: none;
            font-weight: 700;
            display: inline-block;
        }
        .divider {
            text-align: center;
            color: #aaa;
            margin: 1.5rem 0 1rem;
            position: relative;
        }
        .divider::before, .divider::after {
            content: "";
            display: inline-block;
            width: 40px;
            height: 1.3px;
            background: #eee;
            vertical-align: middle;
            margin: 0 8px;
        }
    </style>
</head>
<body>
    <div class="login-card shadow-lg">
        <div class="text-center mb-4">
            <img src="" width="42" style="margin-bottom: 6px;">
            <div class="login-title mt-1">Selamat Datang!</div>
            <div class="desc">Masuk ke <b>Bengkel Saluyu</b> untuk lanjut.</div>
        </div>

        <!-- FORM LOGIN -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" class="form-control" name="email" required autofocus>
            </div>
            <!-- Password -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100 mb-2">Masuk Sekarang</button>
        </form>
        <div class="divider">Belum Punya Akun?</div>
        <a href="{{ route('register') }}" class="btn btn-tes w-100 mb-2">Daftar di sini</a>
        {{-- <button type="submit" class="btn btn-tes w-100 mb-2">Daftar Sekarang</button> --}}

        {{-- <div class="mt-3 text-center small"> --}}
            {{-- <span>Belum punya akun?</span> --}}
            {{-- <a href="{{ route('register') }}" class="small-link">Daftar di sini</a> --}}
        {{-- </div> --}}
    </div>
</body>
</html>
