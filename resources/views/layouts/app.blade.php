<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bengkel Mobil Saluyu</title>

    <!-- Swiper CSS -->
    <link href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <!-- Google Fonts for Stylish Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ff6f61; color: white;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: white; font-family: 'Poppins', sans-serif; font-size: 22px; font-weight: 600;">
                Bengkel Mobil Saluyu
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" style="flex-wrap: wrap; text-align: center;">
                    <li class="nav-item">
                        <a class="nav-link active" href="#layanan" style="color: white; padding: 8px 15px;">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#katalog-sparepart" style="color: white; padding: 8px 15px;">Katalog Sparepart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: white; padding: 8px 15px;">Cek Status Kendaraan Anda</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('booking.riwayat') }}">Riwayat Booking</a> --}}
                        <a class="nav-link" href="{{ route('booking.riwayat')}}" style="color: white; padding: 8px 15px;">Riwayat Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="color: white; padding: 8px 15px;">Riwayat Pembayaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimoni" style="color: white; padding: 8px 15px;">Testimoni</a>
                    </li>
                    {{-- <li class="nav-item"> --}}
                        {{-- <a class="nav-link" href="#" style="color: white; padding: 8px 15px;">Login</a> --}}
                        {{-- <a href="{{ route('login') }}" class="btn btn-light me-2">Masuk</a> --}}
                    {{-- </li> --}}
                    {{-- <li class="nav-item"> --}}
                      {{-- <button class="btn btn-outline-light btn-sm">Logout</button> --}}
                        
                    {{-- </li> --}}
                </ul>
                 <!-- AUTH menu -->
                  @auth
                      <span class="text-white fw-bold me-3">Halo {{ auth()->user()->name }}</span>
                      <form action="{{ route('logout') }}" method="POST" class="d-inline">
                          @csrf
                          <button class="btn btn-outline-light btn-sm">Logout</button>
                      </form>
                  @else
                      <a href="{{ route('login') }}" class="btn btn-light me-2">Masuk</a>
                      <a href="{{ route('register') }}" class="btn btn-outline-light">Daftar</a>
                  @endauth
            </div>
        </div>
    </nav>

    <!-- Banner Section -->
    <section class="banner"
        style="position: relative; height: 400px; background-image: url('{{ asset('images/banner.jpg') }}'); background-size: cover; background-position: center;">
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.4);"></div>
        <div class="container text-white text-center"
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
            <h1 style="font-family: 'Poppins', sans-serif; font-size: 48px; font-weight: 700; margin-bottom: 10px;">
                Selamat Datang Di Bengkel Mobil Saluyu
            </h1>
            <p style="font-family: 'Poppins', sans-serif; font-size: 18px; margin-bottom: 20px;">
                Pusat servis mobil profesional dan berkualitas di Cikarang. <br>
                Layanan perbaikan mesin, kaki-kaki, AC, hingga penggantian sparepart dengan teknisi berpengalaman.
            </p>
            <a href="#booking" class="btn btn-danger" style="font-size: 18px; padding: 12px 25px;">BOOKING SEKARANG</a>
        </div>
    </section>

    <!-- Layanan Section -->
      <section id="layanan" class="py-5 bg-light">
          <div class="container">
              <h2 class="text-center mb-5 fw-bold">Layanan Kami</h2>
              <div class="row g-4">
                  <div class="col-md-3">
                      <div class="card h-100 shadow text-center">
                          <div class="card-body">
                              <h5 class="card-title fw-bold">Servis Mesin</h5>
                              <p class="card-text mb-2">Perbaikan & perawatan mesin semua tipe mobil.</p>
                              <div class="fw-semibold text-danger mb-1">Mulai Dari Rp 200.000</div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card h-100 shadow text-center">
                          <div class="card-body">
                              <h5 class="card-title fw-bold">Servis AC</h5>
                              <p class="card-text mb-2">Perbaikan AC, pengisian freon, ganti filter, dan lainnya.</p>
                              <div class="fw-semibold text-danger mb-1">Mulai Dari Rp 180.000</div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card h-100 shadow text-center">
                          <div class="card-body">
                              <h5 class="card-title fw-bold">Kaki-kaki & Suspensi</h5>
                              <p class="card-text mb-2">Perbaikan suspensi, rem, dan sistem kemudi.</p>
                              <div class="fw-semibold text-danger mb-1">Mulai Dari Rp 150.000</div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card h-100 shadow text-center" id="sparepart">
                          <div class="card-body">
                              <h5 class="card-title fw-bold">Sparepart</h5>
                              <p class="card-text mb-2">Penjualan & penggantian sparepart original.</p>
                              <div class="fw-semibold text-danger mb-1">Mulai Dari Rp 50.000</div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
    <!-- Section Katalog Sparepart -->
<section id="katalog-sparepart" class="py-5 bg-white">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Katalog Sparepart</h2>

        <!-- Swiper -->
        <div class="swiper katalogSwiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="card h-100 shadow text-center">
                        <img src="sparepart/oli-shell-helix.png" class="card-img-top" alt="Oli Mesin Shell Helix" style="object-fit: contain; height: 180px; width: 100%;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Oli Mesin Shell Helix</h5>
                            <div class="mb-2">
                                <span class="badge bg-success px-3 py-2" style="font-size: 1rem;">
                                    <i class="bi bi-box-seam"></i> Stok: 10
                                </span>
                            </div>
                            <div class="fw-semibold text-danger mb-2">Rp 120.000</div>
                            <button type="button" class="btn btn-success mt-auto"
                            onclick="openOrderModal('Oli Mesin Shell Helix')">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="card h-100 shadow text-center">
                        <img src="sparepart/aki-ns40zl.jpg" class="card-img-top" alt="Aki NS40ZL" style="object-fit: contain; height: 180px; width: 100%;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Aki NS40ZL</h5>
                            <div class="mb-2">
                                <span class="badge bg-success px-3 py-2" style="font-size: 1rem;">
                                    <i class="bi bi-box-seam"></i> Stok: 15
                                </span>
                            </div>
                            <div class="fw-semibold text-danger mb-2">Rp 650.000</div>
                            <button type="button" class="btn btn-success mt-auto"
                            onclick="openOrderModal('Aki N540ZL')">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="card h-100 shadow text-center">
                        <img src="sparepart/busi-ngk.jpg" class="card-img-top" alt="Busi NGK" style="object-fit: contain; height: 180px; width: 100%;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Busi NGK</h5>
                            <div class="mb-2">
                                <span class="badge bg-success px-3 py-2" style="font-size: 1rem;">
                                    <i class="bi bi-box-seam"></i> Stok: 15
                                </span>
                            </div>
                            <div class="fw-semibold text-danger mb-2">Rp 45.000</div>
                            <button type="button" class="btn btn-success mt-auto"
                            onclick="openOrderModal('Busi NGK')">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>

                <!-- Slide 4 -->
                <div class="swiper-slide">
                    <div class="card h-100 shadow text-center">
                        <img src="sparepart/filter-ac.jpg" class="card-img-top" alt="Filter AC" style="object-fit: contain; height: 180px; width: 100%;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Filter AC</h5>
                            <div class="mb-2">
                                <span class="badge bg-success px-3 py-2" style="font-size: 1rem;">
                                    <i class="bi bi-box-seam"></i> Stok: 20
                                </span>
                            </div>
                            <div class="fw-semibold text-danger mb-2">Rp 185.000</div>
                            <button type="button" class="btn btn-success mt-auto"
                            onclick="openOrderModal('Filter Ac')">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>

                <!-- Add more slides here -->
                             <!-- Sparepart lainnya -->
           <div class="swiper-slide">
                    <div class="card h-100 shadow text-center">
                        <img src="sparepart/kampas-kopling.jpg" class="card-img-top" alt="kampas kopling" style="object-fit: contain; height: 180px; width: 100%;">
                        <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Kampas Kopling</h5>
                        <div class="mb-2">
                            <span class="badge bg-success px-3 py-2" style="font-size: 1rem;">
                                <i class="bi bi-box-seam"></i> Stok: 25
                            </span>
                        </div>
                        <div class="fw-semibold text-danger mb-2">Rp 45.000</div>
                        <button type="button" class="btn btn-success mt-auto"
                        onclick="openOrderModal('Kampas Kopling')">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

             <!-- Sparepart lainnya -->
            <div class="swiper-slide">
                    <div class="card h-100 shadow text-center">
                        <img src="sparepart/kampas-rem.jpg" class="card-img-top" alt="Kampas Rem" style="object-fit: contain; height: 180px; width: 100%;">
                        <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Kampas Rem</h5>
                        <div class="mb-2">
                            <span class="badge bg-success px-3 py-2" style="font-size: 1rem;">
                                <i class="bi bi-box-seam"></i> Stok: 25
                            </span>
                        </div>
                        <div class="fw-semibold text-danger mb-2">Rp 45.000</div>
                        <button type="button" class="btn btn-success mt-auto"
                        onclick="openOrderModal('Kampas Rem')">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

             <!-- Sparepart lainnya -->
            <div class="swiper-slide">
                    <div class="card h-100 shadow text-center">
                        <img src="sparepart/Radioator-coolant.jpg" class="card-img-top" alt="Radioator Coolant" style="object-fit: contain; height: 180px; width: 100%;">
                        <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Radioator Coolant</h5>
                        <div class="mb-2">
                            <span class="badge bg-success px-3 py-2" style="font-size: 1rem;">
                                <i class="bi bi-box-seam"></i> Stok: 25
                            </span>
                        </div>
                        <div class="fw-semibold text-danger mb-2">Rp 45.000</div>
                        <button type="button" class="btn btn-success mt-auto"
                          onclick="openOrderModal('Radiotor Coolant')">Pesan Sekarang</button>
                    </div>
                </div>
            </div>

             <!-- Sparepart lainnya -->
            <div class="swiper-slide">
                    <div class="card h-100 shadow text-center">
                        <img src="sparepart/wiper-toyota.jpg" class="card-img-top" alt="Wiper Toyota" style="object-fit: contain; height: 180px; width: 100%;">
                        <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Wiper Toyota</h5>
                        <div class="mb-2">
                            <span class="badge bg-success px-3 py-2" style="font-size: 1rem;">
                                <i class="bi bi-box-seam"></i> Stok: 25
                            </span>
                        </div>
                        <div class="fw-semibold text-danger mb-2">Rp 45.000</div>
                        <button type="button" class="btn btn-success mt-auto"
                        onclick="openOrderModal('Wiper Toyota')">Pesan Sekarang</button>
                    </div>
                </div>
            </div>
            </div>

            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Swiper Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>

<!-- Modal Order Form (hanya 1x di luar Swiper!) -->
      <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form id="formOrder" onsubmit="sendOrderToWA(event)">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Form Pemesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Produk</label>
                  <input type="text" class="form-control" id="produk" name="produk" readonly>
                </div>
                <div class="mb-3">
                  <label class="form-label">Jumlah</label>
                  <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" value="1" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Alamat Lengkap</label>
                  <textarea class="form-control" id="alamat" name="alamat" rows="2" required></textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label">Catatan (opsional)</label>
                  <input type="text" class="form-control" id="catatan" name="catatan">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success w-100">Kirim & Pesan via WhatsApp</button>
              </div>
            </div>
          </form>
        </div>
      </div>

{{-- ...Section Layanan --}}
    
  <section id="booking" class="py-5" style="background: #f9f9f9;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h2 style="font-family: 'Poppins', sans-serif; font-size: 50px; font-weight: 700; margin-bottom: 5px;">
                From Booking Layanan
            </h2>
          {{-- <h2 class="fw-bold">Form Booking Layanan</h2> --}}
          <p style="font-family: 'Poppins', sans-serif; font-size: 18px; margin-bottom: 20px;">
            Silahkan isi formulir berikut untuk mengajukan permintaan servis kendaraan Anda
            Kami akan segera menindak lanjuti setelah menerima data Anda.
            </p>
        </div>
        <div class="col-lg-6">
          <div class="card shadow p-4" style="background: #e63946; color:white; border-radius:22px;">
            <h3 class="text-center mb-4" style="color: white;">Booking Service</h3>
            <form action="{{ route('booking.store') }}" method="POST">
              @csrf

              <!-- Nama Pemilik -->
              <div class="mb-2">
                <label class="form-label mb-1">Nama Pemilik <span class="text-warning">*</span></label>
                <input type="text" name="nama_pemilik" class="form-control" placeholder="Nama Pemilik" value="{{ auth()->user()->name ?? '' }}" {{ auth()->check() ? '' : 'required' }}>
              </div>

              <div class="row g-2 mb-2">
                <div class="col-12 col-md-6">
                  <label class="form-label mb-1">Nomor HP <span class="text-warning">*</span></label>
                  <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP" value="{{ auth()->user()->phone ?? '' }}" {{ auth()->check() ? '' : 'required' }}>
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label mb-1">Nomor Plat Kendaraan <span class="text-warning">*</span></label>
                  <input type="text" name="no_plat" class="form-control" placeholder="Nomor Plat Kendaraan" required>
                </div>
              </div>

              <div class="row g-2 mb-2">
                <div class="col-12 col-md-6">
                  <label class="form-label mb-1">Pilih Layanan</label>
                  <select name="layanan" class="form-control">
                    <option value="">Pilih Layanan</option>
                    <option value="Servis Mesin">Servis Mesin</option>
                    <option value="Servis AC">Servis AC</option>
                    <option value="Kaki-kaki & Suspensi">Kaki-kaki & Suspensi</option>
                    <option value="Lainnya">Lainnya</option>
                  </select>
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label mb-1">Nama Kendaraan</label>
                  <input type="text" name="nama_kendaraan" class="form-control" placeholder="Nama Kendaraan">
                </div>
              </div>

              <div class="row g-2 mb-2">
                <div class="col-12 col-md-6">
                  <label class="form-label mb-1">Model Kendaraan</label>
                  <input type="text" name="model_kendaraan" class="form-control" placeholder="Model Kendaraan">
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label mb-1">Tipe Kendaraan</label>
                  <input type="text" name="tipe_kendaraan" class="form-control" placeholder="Tipe Kendaraan">
                </div>
              </div>

              <div class="mb-2">
                <label class="form-label mb-1">Jenis Permintaan <span class="text-warning">*</span></label>
                <select name="jenis_permintaan" class="form-control" id="jenis_permintaan" required onchange="togglePickupAddress()">
                  <option value="">Pilih Jenis Permintaan</option>
                  <option value="Drop Off">Drop Off</option>
                  <option value="Pickup">Pickup</option>
                </select>
              </div>

              <div class="mb-2" id="pickup_address_group" style="display:none;">
                <label class="form-label mb-1">Alamat Lengkap <span class="text-warning">*</span></label>
                <input type="text" name="alamat_pickup" class="form-control" placeholder="Alamat Lengkap">
              </div>

              <div class="mb-2">
                <label class="form-label mb-1">Catatan Tambahan</label>
                <textarea name="catatan" class="form-control" placeholder="Catatan Tambahan"></textarea>
              </div>

              @auth
                <button type="submit" class="btn btn-warning w-100 fw-bold mt-2" style="color:#222;">
                  KIRIM BOOKING
                </button>
              @else
                <button type="button" class="btn btn-secondary w-100 fw-bold mt-2" disabled>
                  Silakan Login Terlebih Dahulu
                </button>
                <div class="text-center text-white mt-2" style="font-size: 0.98em;">Anda harus login untuk booking servis.</div>
              @endauth
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section Testimoni -->
      <section id="testimoni" class="py-5 bg-white">
        <div class="container">
          <h2 class="text-center mb-5 fw-bold">Apa Kata Pelanggan Kami</h2>
          <div id="testimoniCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="d-flex flex-column align-items-center">
                  <div class="card shadow-sm border-0" style="max-width:400px;">
                    <div class="card-body text-center">
                      <div class="mb-2 text-warning fs-4">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                      </div>
                      <p class="mb-2 fst-italic">“Pelayanan cepat dan ramah. Mobil jadi lebih nyaman!”</p>
                      <small class="text-muted">— Rizki, Bekasi</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="d-flex flex-column align-items-center">
                  <div class="card shadow-sm border-0" style="max-width:400px;">
                    <div class="card-body text-center">
                      <div class="mb-2 text-warning fs-4">
                        &#9733;&#9733;&#9733;&#9733;&#9734;
                      </div>
                      <p class="mb-2 fst-italic">“Harga service terjangkau, teknisi sangat profesional.”</p>
                      <small class="text-muted">— Budi, Cikarang</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="d-flex flex-column align-items-center">
                  <div class="card shadow-sm border-0" style="max-width:400px;">
                    <div class="card-body text-center">
                      <div class="mb-2 text-warning fs-4">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                      </div>
                      <p class="mb-2 fst-italic">“Booking online mudah, langsung dapat antrean!”</p>
                      <small class="text-muted">— Sari, Bekasi</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="d-flex flex-column align-items-center">
                  <div class="card shadow-sm border-0" style="max-width:400px;">
                    <div class="card-body text-center">
                      <div class="mb-2 text-warning fs-4">
                        &#9733;&#9733;&#9733;&#9733;&#189;
                      </div>
                      <p class="mb-2 fst-italic">“Sparepart original dan proses penggantian cepat.”</p>
                      <small class="text-muted">— Yanto, Cikarang</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="d-flex flex-column align-items-center">
                  <div class="card shadow-sm border-0" style="max-width:400px;">
                    <div class="card-body text-center">
                      <div class="mb-2 text-warning fs-4">
                        &#9733;&#9733;&#9733;&#9733;&#9733;
                      </div>
                      <p class="mb-2 fst-italic">“Bengkel langganan keluarga, sangat recommended!”</p>
                      <small class="text-muted">— Maya, Cikarang</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Selanjutnya</span>
            </button>
          </div>
        </div>
      </section>

      <!-- Kontak & Maps -->
      <section id="kontak" class="py-5 bg-light">
        <div class="container">
          <h2 class="text-center mb-4">Hubungi & Kunjungi Kami</h2>
          <div class="row align-items-center">
            <div class="col-md-6 mb-3">
              <ul class="list-unstyled fs-5">
                <li><strong>Alamat:</strong> Gereng RT001/RW004, Jl. Kp. Kandang, Hegarmukti, Kec. Cikarang Pusat,<br>Kabupaten Bekasi, Jawa Barat 17530</li>
                <li>
                  <strong>Telepon:</strong>
                  <a href="https://wa.me/6283896146678" target="_blank" class="text-success text-decoration-none">
                    0838-9614-6678 <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WA" width="20" style="margin-bottom:3px;">
                  </a>
                </li>
                <li><strong>Email:</strong> info@bengkelsaluyu.com</li>
              </ul>
            </div>
            <div class="col-md-6 mb-3">
              <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.208719929456!2d107.1762649!3d-6.346314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699b93774e373f%3A0xa5d153c3b062e83c!2sBengkel%20mobil%20saluyu!5e0!3m2!1sid!2sid!4v1719054217516!5m2!1sid!2sid"
                  width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>
        </div>
      </section>

      <!-- FAQ -->
      <section id="faq" class="py-5">
        <div class="container">
          <h2 class="text-center mb-4">FAQ</h2>
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                  Apakah harus booking sebelum datang?
                </button>
              </h2>
              <div id="faq1" class="accordion-collapse collapse show">
                <div class="accordion-body">
                  Tidak wajib, tapi booking akan menghindari antrian.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                  Apakah sparepart yang dijual original?
                </button>
              </h2>
              <div id="faq2" class="accordion-collapse collapse">
                <div class="accordion-body">
                  Ya, kami hanya menyediakan sparepart original dan bergaransi.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                  Apa bisa booking via WA?
                </button>
              </h2>
              <div id="faq3" class="accordion-collapse collapse">
                <div class="accordion-body">
                  Bisa, silakan chat kami di WhatsApp untuk booking cepat.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                  Apakah bisa servis di luar jam kerja?
                </button>
              </h2>
              <div id="faq4" class="accordion-collapse collapse">
                <div class="accordion-body">
                  Untuk saat ini layanan hanya pada jam kerja Senin–Sabtu 08.00–17.00.
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      

<!-- Scripts -->
<script>
   var katalogSwiper = new Swiper('.katalogSwiper', {
          slidesPerView: 4,
          spaceBetween: 24,
          loop: true,
          autoplay: {
              delay: 2000,
              disableOnInteraction: false,
              pauseOnMouseEnter: true,
          },
          navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
          },
          pagination: {
              el: '.swiper-pagination',
              clickable: true,
          },
          breakpoints: {
              0:    { slidesPerView: 1 },
              576:  { slidesPerView: 2 },
              768:  { slidesPerView: 3 },
              1200: { slidesPerView: 4 }
          }
      });

// Modal Order
      function openOrderModal(namaProduk) {
        document.getElementById('produk').value = namaProduk;
        document.getElementById('jumlah').value = 1;
        document.getElementById('formOrder').reset();
        document.getElementById('produk').value = namaProduk;
        var modalOrder = new bootstrap.Modal(document.getElementById('orderModal'));
        modalOrder.show();
      }
      function sendOrderToWA(event) {
        event.preventDefault();
        let produk = document.getElementById('produk').value;
        let jumlah = document.getElementById('jumlah').value;
        let nama   = document.getElementById('nama').value;
        let alamat = document.getElementById('alamat').value;
        let catatan= document.getElementById('catatan').value;
        let pesan  = `Halo, saya ingin pesan:\nProduk: ${produk}\nJumlah: ${jumlah}\nNama: ${nama}\nAlamat: ${alamat}`;
        if(catatan) pesan += `\nCatatan: ${catatan}`;
        window.open("https://wa.me/6283896146678?text=" + encodeURIComponent(pesan), '_blank');
        var modalOrder = bootstrap.Modal.getInstance(document.getElementById('orderModal'));
        modalOrder.hide();
      }
</script>

</script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
<!-- Footer -->
      <footer class="bg-danger text-white text-center py-3 mt-5">
          &copy; 2025 Bengkel Mobil Saluyu | All Rights Reserved
      </footer>
</html>
