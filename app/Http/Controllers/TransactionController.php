<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Menampilkan halaman riwayat transaksi.
     */
    public function index()
    {
        $transactions = [
            [
                'invoice' => 'INV-20250927-015',
                'customer_name' => 'Budi Santoso',
                'service' => 'Nano Ceramic Coating',
                'status' => 'Selesai',
                'total' => 750000
            ],
            [
                'invoice' => 'INV-20250927-014',
                'customer_name' => 'Citra Lestari',
                'service' => 'Premium Car Wash',
                'status' => 'Selesai',
                'total' => 150000
            ],
            [
                'invoice' => 'INV-20250927-013',
                'customer_name' => 'Ahmad Subarjo',
                'service' => 'Interior Detailing',
                'status' => 'Dalam Proses',
                'total' => 350000
            ],
            [
                'invoice' => 'INV-20250927-012',
                'customer_name' => 'Dewi Anggraini',
                'service' => 'Glass Coating',
                'status' => 'Selesai',
                'total' => 450000
            ]
        ];

        // Mengirim data ke view
        return view('admin.transaksi', compact('transactions'));
    }

    public function kasirIndex()
    {
        // Data Dummy
        $transactions = [
            [
                'invoice' => 'INV-20250927-015',
                'customer_name' => 'Budi Santoso',
                'service' => 'Nano Ceramic Coating',
                'status' => 'Selesai',
                'total' => 750000
            ],
            [
                'invoice' => 'INV-20250927-014',
                'customer_name' => 'Citra Lestari',
                'service' => 'Premium Car Wash',
                'status' => 'Selesai',
                'total' => 150000
            ],
            [
                'invoice' => 'INV-20250927-013',
                'customer_name' => 'Ahmad Subarjo',
                'service' => 'Interior Detailing',
                'status' => 'Dalam Proses',
                'total' => 350000
            ],
            [
                'invoice' => 'INV-20250927-011',
                'customer_name' => 'Rina Marlina',
                'service' => 'Premium Car Wash',
                'status' => 'Ditunggu',
                'total' => 150000
            ]
        ];
        
        // Daftar status yang bisa dipilih
        $statuses = ['Ditunggu', 'Dalam Proses', 'Selesai'];

        return view('kasir.transaksi', compact('transactions', 'statuses'));
    }
}