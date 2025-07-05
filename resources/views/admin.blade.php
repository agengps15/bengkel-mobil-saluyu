@extends('dashboard') {{-- Pastikan layout admin ada. Jika belum, bisa pakai HTML biasa di bawah --}}

@section('content')
    <h1 class="mb-4">Dashboard Admin</h1>
     <div class="row">
                <!-- Total Users Card -->
                <div class="col-md-3">
                    <div class="card card-box bg-danger text-white">
                        <div class="card-body">
                            <i class="fas fa-users fa-3x"></i>
                            <h5>Total Users</h5>
                            <h3>{{ \App\Models\User::count() }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Total Registrations Card -->
                <div class="col-md-3">
                    <div class="card card-box bg-success text-white">
                        <div class="card-body">
                            <i class="fas fa-user-plus fa-3x"></i>
                            <h5>Total Registrations</h5>
                            <h3>11</h3>
                        </div>
                    </div>
                </div>

                <!-- Total Services Card -->
                <div class="col-md-3">
                    <div class="card card-box bg-warning text-white">
                        <div class="card-body">
                            <i class="fas fa-cogs fa-3x"></i>
                            <h5>Total Service</h5>
                            <h3>6</h3>
                        </div>
                    </div>
                </div>

                <!-- Total Payments Card -->
                <div class="col-md-3">
                    <div class="card card-box bg-primary text-white">
                        <div class="card-body">
                            <i class="fas fa-credit-card fa-3x"></i>
                            <h5>Total Pembayaran</h5>
                            <h3>8</h3>
                        </div>
                    </div>
                </div>
            </div>
@endsection
