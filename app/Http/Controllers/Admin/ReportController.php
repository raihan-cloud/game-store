<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Tampilkan laporan penjualan utama.
     */
    public function sales(Request $request)
    {
        // 1. Tentukan Rentang Waktu
        // Jika ada input, pakai input. Jika tidak, pakai bulan ini.
        $startDate = $request->start_date 
            ? Carbon::parse($request->start_date)->startOfDay() 
            : Carbon::now()->startOfMonth();

        $endDate = $request->end_date 
            ? Carbon::parse($request->end_date)->endOfDay() 
            : Carbon::now()->endOfMonth();

        // 2. Ambil Data Pesanan
        // 'with("user")' digunakan agar query lebih cepat saat memanggil nama user di view
        $orders = Order::with('user')
                    ->where('status', 'Paid')
                    ->whereBetween('created_at', [$startDate, $endDate])
                    ->orderBy('created_at', 'desc') // Urutkan dari yang terbaru
                    ->get();

        // 3. Hitung Ringkasan (Opsional, jika ingin ditampilkan di widget atas tabel)
        // PENTING: Pastikan 'total_price' sesuai dengan nama kolom di database Anda (bisa jadi 'grand_total' atau 'amount')
        $totalRevenue = $orders->sum('total_price'); 
        $totalOrders = $orders->count();

        // 4. Kirim ke View
        // Variabel 'orders' ini yang ditunggu oleh sales.blade.php
        return view('admin.reports.sales', compact('orders', 'totalRevenue', 'totalOrders', 'startDate', 'endDate'));
    }
}