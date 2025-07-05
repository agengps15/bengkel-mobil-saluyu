@extends('dashboard')

@section('content')
<style>
    .card-permintaan {
    box-shadow: 0 8px 32px 0 rgba(60,42,251,0.10);
    border-radius: 18px;
    border: none;
    margin-top: 32px;
    background: #fff;
}

.table thead th {
    background: linear-gradient(90deg, #3c2afb 70%, #6a11cb 100%);
    color: #fff;
    font-size: 1rem;
    font-weight: 600;
    letter-spacing: .5px;
    border-top: none;
}

.table-striped > tbody > tr:nth-of-type(odd) {
    background: #f8f8fc;
}

.table tbody tr {
    transition: background 0.13s;
}

.table tbody tr:hover {
    background: #e6e8ff !important;
}

.badge-status {
    font-size: 0.99rem;
    font-weight: 500;
    padding: 7px 18px;
    border-radius: 50px;
    letter-spacing: .5px;
    display: inline-block;
}

.badge-menunggu {
    background: #ffefd0;
    color: #ff9800;
    border-color: #ffd18b;
}

.badge-dikonfirmasi {
    background: #e4fbe0;
    color: #2eb872;
    border-color: #a6f3c0;
}

.badge-selesai {
    background: #e3e9ff;
    color: #4869e8;
    border-color: #b4c6fc;
}

.badge-ditolak {
    background: #ffdada;
    color: #e62e2e;
    border-color: #ffacac;
}

.btn-aksi {
    border-radius: 50px;
    padding: 7px 18px;
    font-weight: 500;
    font-size: 1rem;
    margin-bottom: 5px;
}

.judul-permintaan {
    font-weight: bold;
    color: #2b227a;
    font-size: 2.2rem;
    text-align: center;
    margin-bottom: 20px;
}

/* Responsiveness */
@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.85rem;
        overflow-x: auto;
    }
    .table {
        width: 100%;
        font-size: 0.9rem;
    }

    /* Mengatur tombol agar tidak mepet */
    .btn-aksi-container {
        flex-direction: column;
        gap: 15px;
    }

    /* Mengurangi ukuran judul di perangkat kecil */
    .judul-permintaan {
        font-size: 1.5rem;
    }
}

/* Set max-width for tables to avoid clipping */
.table-responsive {
    overflow-x: auto;
    max-width: 100%;
}

</style>

<div class="container-fluid">
    <div class="judul-permintaan">
        Daftar Permintaan Layanan
    </div>
    <div class="card card-permintaan p-4">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle shadow-sm">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama_Pemilik</th>
                        <th>Layanan</th>
                        <th>Nama_Kendaraan</th>
                        <th>Model</th>
                        <th>No_Plat</th>
                        <th>Catatan</th>
                        <th>Tagihan</th>
                        <th>Rincian_Biaya</th>
                        <th>Bukti_Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($booking->created_at)->format('d/m/Y H:i') }}</td>
                        <td>{{ $booking->nama_pemilik }}</td>
                        <td>{{ $booking->layanan }}</td>
                        <td>{{ $booking->nama_kendaraan }}</td>
                        <td>{{ $booking->model_kendaraan }}</td>
                        <td>{{ $booking->no_plat }}</td>
                        <td>{{ $booking->catatan }}</td>
                        <td>
                            @if($booking->tagihan)
                                Rp{{ number_format($booking->tagihan, 2, ',', '.') }}
                            @else
                                Belum ada tagihan
                            @endif
                        </td>
                        <td>
                            @if($booking->rincian_biaya)
                                {{ $booking->rincian_biaya }}
                            @else
                                Belum ada rincian biaya
                            @endif
                        </td>
                        <td>{{ $booking->bukti_pembayaran}}</td>
                        <td>
                            @php
                                $badgeClass = 'badge-status badge-menunggu';
                                if ($booking->status && $booking->status->nama_status == 'Dikonfirmasi') {
                                    $badgeClass = 'badge-status badge-dikonfirmasi';
                                } elseif ($booking->status && $booking->status->nama_status == 'Selesai') {
                                    $badgeClass = 'badge-status badge-selesai';
                                } elseif ($booking->status && $booking->status->nama_status == 'Ditolak') {
                                    $badgeClass = 'badge-status badge-ditolak';
                                }
                            @endphp
                            <span class="{{ $badgeClass }}">
                                {{ $booking->status ? $booking->status->nama_status : '-' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-aksi-container">
                                <!-- Ubah Status -->
                                <button type="button" class="btn btn-warning btn-aksi" onclick="showUbahStatusModal({{ $booking->id }})">
                                    <i class="fas fa-edit"></i> Ubah Status
                                </button>
                                <!-- Tombol Hapus -->
                                <button type="button" class="btn btn-danger btn-aksi" onclick="showDeleteModal({{ $booking->id }})">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if($bookings->count() == 0)
                        <tr>
                            <td colspan="12" class="text-center text-secondary py-4">
                                <i class="fas fa-info-circle me-2"></i> Belum ada permintaan layanan masuk.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Ubah Status dan Tagihan -->
<div class="modal fade" id="ubahStatusModal" tabindex="-1" aria-labelledby="ubahStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ubahStatusModalLabel">Ubah Status Permintaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <form id="ubahStatusForm" action="" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Menunggu">Menunggu</option>
                            <option value="Dikonfirmasi">Dikonfirmasi</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tagihan" class="form-label">Jumlah Tagihan (Rp)</label>
                        <input type="number" class="form-control" id="tagihan" name="tagihan" placeholder="Masukkan tagihan" required>
                    </div>
                    <div class="mb-3">
                        <label for="rincian_biaya" class="form-label">Rincian Biaya & Kerusakan</label>
                        <textarea class="form-control" id="rincian_biaya" name="rincian_biaya" rows="3" placeholder="Masukkan rincian biaya dan kerusakan" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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
    var url = "{{ route('admin.permintaan-layanan.hapus', ':id') }}";
    url = url.replace(':id', id);
    document.getElementById('formDelete').setAttribute('action', url);
    var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

function showUbahStatusModal(id) {
    var url = "{{ route('admin.permintaan-layanan.konfirmasi', ':id') }}";
    url = url.replace(':id', id);
    document.getElementById('ubahStatusForm').setAttribute('action', url);
    
    // Update status, tagihan, rincian biaya pada modal
    var bookingData = @json($bookings); // Mengambil data bookings dari controller
    var booking = bookingData.find(b => b.id == id);
    
    // Update field form dengan data booking
    document.getElementById('status').value = booking.status ? booking.status.nama_status : 'Menunggu';
    document.getElementById('tagihan').value = booking.tagihan ? booking.tagihan : '';
    document.getElementById('rincian_biaya').value = booking.rincian_biaya ? booking.rincian_biaya : '';
    
    var modal = new bootstrap.Modal(document.getElementById('ubahStatusModal'));
    modal.show();
}
</script>
@endsection
