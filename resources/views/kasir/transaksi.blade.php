@extends('layouts.dashboard')

@section('title', 'Manajemen Transaksi')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manajemen Transaksi</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
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
                                    <form action="#" method="POST">
                                        @csrf
                                        <select name="status" class="form-select form-select-sm">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status }}" {{ $transaction['status'] == $status ? 'selected' : '' }}>
                                                    {{ $status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </td>
                                <td>Rp {{ number_format($transaction['total'], 0, ',', '.') }}</td>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Data transaksi kosong.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection