<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Menampilkan halaman utama laporan.
     */
    public function index()
    {
        // Data Dummy untuk Ringkasan
        $summary = [
            'total_pendapatan' => 15730000,
            'total_transaksi' => 352,
            'rata_rata_transaksi' => 15730000 / 352,
        ];

        // Data Dummy untuk Tabel Laporan Pendapatan Harian
        $dailyReport = [
            ['tanggal' => '2025-10-03', 'jumlah_transaksi' => 8, 'total_pendapatan' => 1850000],
            ['tanggal' => '2025-10-02', 'jumlah_transaksi' => 12, 'total_pendapatan' => 2300000],
            ['tanggal' => '2025-10-01', 'jumlah_transaksi' => 9, 'total_pendapatan' => 1950000],
        ];

        // Data Dummy untuk Tabel Laporan Kinerja Layanan
        $serviceReport = [
            ['nama_layanan' => 'Premium Car Wash', 'jumlah_dipesan' => 80, 'total_pendapatan' => 12000000],
            ['nama_layanan' => 'Nano Ceramic Coating', 'jumlah_dipesan' => 15, 'total_pendapatan' => 11250000],
            ['nama_layanan' => 'Interior Detailing', 'jumlah_dipesan' => 25, 'total_pendapatan' => 8750000],
        ];

        // Mengirim semua data ke view 'admin.laporan'
        return view('admin.laporan', compact('summary', 'dailyReport', 'serviceReport'));
    }
}