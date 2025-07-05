<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- For icons -->
    <style>
        .card-box {
            margin-bottom: 20px;
            border-radius: 15px;
        }

        .card-box .card-body {
            text-align: center;
            font-size: 20px;
        }

        .sidebar {
            background: linear-gradient(135deg, #3c2afb 65%, #4f44fd 100%);
            color: #fff;
            min-height: 100vh;
            min-width: 240px;
            box-shadow: 2px 0 14px rgba(187, 194, 90, 0.09);
        }

        .sidebar h3 {
            margin-bottom: 40px;
            letter-spacing: 1px;
            font-weight: 700;
            font-size: 2rem;
            padding-left: 8px;
        }

        .sidebar .nav-link {
            color: white;
            padding: 10px;
            font-size: 20px;
        }

        .sidebar .nav-link:hover {
            background-color: #007bff;
        }

        .sidebar .nav-link.active {
            /* background-color: #8108cc; */
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
       <div class="sidebar p-4 d-flex flex-column align-items-start">
        <h3>Halo Admin</h3>
        <ul class="nav flex-column w-100">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" href="{{ route('admin') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>

                <!-- Operasional Dropdown -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#operasional" role="button" aria-expanded="false" aria-controls="operasional">
                        <i class="fas fa-cogs"></i> Operasional
                    </a>
                    <div class="collapse" id="operasional">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                 <a class="nav-link" href="{{ route('admin.daftar-permintaan') }}">Permintaan Layanan </a>
                                {{-- <a class="nav-link" href="#">Permintaan Layanan</a> --}}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Daftar Mekanik</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Maintenance Dropdown -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#maintenance" role="button" aria-expanded="false" aria-controls="maintenance">
                        <i class="fas fa-tools"></i> Maintenance
                    </a>
                    <div class="collapse" id="maintenance">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Daftar Kategori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Daftar Layanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Daftar User</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Admin Section -->
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-users-cog"></i> Admin
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-white">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="container-fluid p-4">
            @yield('content')
        </div>
    </div>
     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
