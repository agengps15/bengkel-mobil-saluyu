<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Booking Layanan</title>

    <!-- Swiper CSS -->
    <link href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container {
            margin-top: 50px;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .filter-container {
            margin-bottom: 20px;
        }

        .btn-danger {
            background-color: #e63946;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c53030;
        }

        .upload-button {
            color: white;
            background-color: #ff6f61;
            padding: 5px 15px;
            font-size: 14px;
            border-radius: 8px;
        }

        .upload-button:hover {
            background-color: #e05d52;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Riwayat Booking Anda</h2>
        <p class="text-center mb-5">Berikut adalah riwayat booking layanan kendaraan Anda.</p>

        <!-- Filter -->
        <div class="filter-container d-flex justify-content-between mb-3">
            <div>
                <input type="text" class="form-control" id="searchInput" placeholder="Cari layanan/kendaraan..." style="width: 300px;">
            </div>
            <div>
                <select class="form-control" id="statusSelect" style="width: 200px;">
                    <option value="semua">Semua Status</option>
                    <option value="selesai">Selesai</option>
                    <option value="proses">Proses</option>
                    <option value="dibatalkan">Dibatalkan</option>
                </select>
            </div>
            <div class="col-md-2">
            <button class="btn btn-danger w-100" id="filterButton">Filter</button>
            </div>
            <div class="col-md-2">
                <a href="{{ url('/') }}" class="btn btn-outline-secondary w-100">KEMBALI</a>
            </div>
            {{-- <button class="btn btn-outline-secondary" id="backButton">Kembali</button> --}}
        </div>

        <!-- Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Layanan</th>
                    <th>Nama Kendaraan</th>
                    <th>Model</th>
                    <th>No Plat</th>
                    <th>Tagihan & Rincian Biaya</th>
                    <th>Bukti Pembayaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="bookingTableBody">
                @foreach($bookings as $booking)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($booking->created_at)->format('d/m/Y H:i') }}</td>
                    <td>{{ $booking->layanan }}</td>
                    <td>{{ $booking->nama_kendaraan }}</td>
                    <td>{{ $booking->model_kendaraan }}</td>
                    <td>{{ $booking->no_plat }}</td>
                    <td>{{ $booking->tagihan }}</td>
                    <td>
                        @if($booking->bukti_pembayaran)
                            <a href="{{ asset('uploads/bukti/'.$booking->bukti_pembayaran) }}" class="btn btn-primary" target="_blank">Lihat Bukti</a>
                        @else
                            <button class="upload-button" onclick="uploadBukti({{ $booking->id }})">Upload Bukti</button>
                        @endif
                    </td>
                    <td>{{ $booking->status ? $booking->status->nama_status : 'Menunggu' }}</td>
                    <td>
                        {{-- <form action="{{ route('booking.hapus', $booking->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-aksi mb-1">
            <i class="fas fa-trash"></i> Hapus
        </button>
    </form> --}}

    {{-- <form action="{{ route('booking.hapus', $booking->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    
</form> --}}
<button type="butoon" class="btn btn-danger btn-aksi mb-1" onclick="showDeleteModal({{ $booking->id }})">
        <i class="fas fa-trash"></i> Hapus
    </button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Upload Bukti Pembayaran -->
    <div class="modal" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Bukti Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="file" class="form-control" id="buktiPembayaranFile">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="simpanBukti()">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center">
                <p>Apakah Anda yakin ingin menghapus data ini?</p>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <form id="formDelete" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">YA, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function showDeleteModal(id) {
    var url = "{{ route('booking.hapus', ':id') }}";
    url = url.replace(':id', id);
    document.getElementById('formDelete').setAttribute('action', url);
    var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
</script>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        // Filter Functionality
        document.getElementById("filterButton").addEventListener("click", function() {
            const searchInput = document.getElementById("searchInput").value.toLowerCase();
            const statusSelect = document.getElementById("statusSelect").value;

            // Filter the table rows based on the input and selected status
            const rows = document.querySelectorAll("#bookingTableBody tr");
            rows.forEach(row => {
                const layanan = row.cells[1].textContent.toLowerCase();
                const noPlat = row.cells[4].textContent.toLowerCase();
                const status = row.cells[7].textContent.toLowerCase();

                let showRow = true;
                if (searchInput && !layanan.includes(searchInput) && !noPlat.includes(searchInput)) {
                    showRow = false;
                }

                if (statusSelect !== "semua" && status !== statusSelect) {
                    showRow = false;
                }

                row.style.display = showRow ? "" : "none";
            });
        });

        // Upload bukti pembayaran
        function uploadBukti(bookingId) {
            currentBookingId = bookingId;
            const uploadModal = new bootstrap.Modal(document.getElementById("uploadModal"));
            uploadModal.show();
        }

        function simpanBukti() {
            const fileInput = document.getElementById("buktiPembayaranFile");
            const file = fileInput.files[0];
            if (file) {
                alert("Bukti Pembayaran berhasil diupload!");
                // Implement file upload logic here
            }
            const uploadModal = bootstrap.Modal.getInstance(document.getElementById("uploadModal"));
            uploadModal.hide();
        }

        function hapusPesanan(bookingId) {
            if (confirm("Apakah Anda yakin ingin menghapus pesanan ini?")) {
                // Logic to remove the row from the table (or delete from the database)
                const row = document.querySelector(`#bookingTableBody tr[data-booking-id='${bookingId}']`);
                row.remove();
                alert("Pesanan berhasil dihapus!");
            }
        }
    </script>
</body>

</html>
