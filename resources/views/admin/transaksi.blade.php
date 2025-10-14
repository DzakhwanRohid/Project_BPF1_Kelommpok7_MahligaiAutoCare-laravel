@extends('layouts.dashboard')

@section('title', 'Riwayat Transaksi')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat Transaksi</h1>
        {{-- Di sini nanti bisa ditambahkan tombol "Tambah Transaksi" atau filter --}}
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Seluruh Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. Invoice</th>
                            <th>Nama Pelanggan</th>
                            <th>Layanan</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction['invoice'] }}</td>
                                <td>{{ $transaction['customer_name'] }}</td>
                                <td>{{ $transaction['service'] }}</td>
                                <td>
                                    @if ($transaction['status'] == 'Selesai')
                                        <span class="badge bg-success">{{ $transaction['status'] }}</span>
                                    @else
                                        <span class="badge bg-warning text-dark">{{ $transaction['status'] }}</span>
                                    @endif
                                </td>
                                <td>Rp {{ number_format($transaction['total'], 0, ',', '.') }}</td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data transaksi masih kosong.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection