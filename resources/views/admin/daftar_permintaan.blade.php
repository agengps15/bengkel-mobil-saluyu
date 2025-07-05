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
        font-size: 1.07rem;
        font-weight: 600;
        letter-spacing: .5px;
        border-top: none;
    }
    .table-striped > tbody > tr:nth-of-type(odd){
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
        border: 1px solid transparent;
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
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-bottom: 3px;
    }
    .judul-permintaan {
        display: flex;
        align-items: center;
        gap: 13px;
        justify-content: center;
        margin-bottom: 10px;
        font-weight: bold;
        color: #2b227a;
        font-size: 2.2rem;
    }
    .icon-bg {
        background: #eceafe;
        padding: 8px 15px;
        border-radius: 10px;
        margin-right: 7px;
    }
    @media (max-width: 768px) {
        .card-permintaan { padding: 0; }
        .table-responsive { font-size: 0.97rem; }
        .judul-permintaan { font-size: 1.2rem; }
    }
</style>

<div class="container-fluid">
    <div class="judul-permintaan mt-4">
        <span class="icon-bg"><i class="fas fa-clipboard-list fa-lg"></i></span>
        Daftar Permintaan Layanan
    </div>
    <p class="text-center text-secondary mb-4" style="letter-spacing:0.1px;">
        Berikut adalah daftar permintaan layanan kendaraan yang diajukan oleh customer.
    </p>

    <div class="card card-permintaan p-4">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle shadow-sm">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nama Pemilik</th>
                        <th>Layanan</th>
                        <th>Nama Kendaraan</th>
                        <th>Model</th>
                        <th>No Plat</th>
                        <th>Catatan</th>
                        {{-- <th>Bukti Pembayaran</th> --}}
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
                        {{-- <td>{{ $booking->tagihan }}</td> --}}
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
                            <!-- Konfirmasi -->
                            <form action="{{ route('admin.permintaan-layanan.konfirmasi', $booking->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success btn-aksi mb-1">
                                    <i class="fas fa-check-circle"></i> Konfirmasi
                                </button>
                            </form>
                            <!-- Tombol Hapus -->
                            <button type="button" class="btn btn-danger btn-aksi" onclick="showDeleteModal({{ $booking->id }})">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @if($bookings->count() == 0)
                        <tr>
                            <td colspan="9" class="text-center text-secondary py-4">
                                <i class="fas fa-info-circle me-2"></i>
                                Belum ada permintaan layanan masuk.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
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
</script>
@endsection