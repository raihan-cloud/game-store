<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order; // Asumsi Anda memiliki model Order
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Tampilkan daftar semua pesanan/transaksi.
     */
    public function index()
    {
        // Ambil semua pesanan dan urutkan berdasarkan tanggal terbaru
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        
        // View ini (admin.orders.index) akan menampilkan daftar pesanan
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Tampilkan detail pesanan spesifik.
     */
    public function show(Order $order)
    {
        // Muat relasi yang diperlukan (user dan item dalam pesanan)
        $order->load('user', 'items.game'); 

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Tampilkan form untuk mengedit (Mengubah status pesanan).
     */
    public function edit(Order $order)
    {
        // Jika status yang diedit hanya status pembayaran
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Perbarui status pesanan di database.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            // Validasi status yang diizinkan (misal: paid, pending, failed)
            'status' => 'required|in:Pending,Paid,Failed,Cancelled,Completed', 
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('admin.orders.show', $order)
                         ->with('success', 'Status pesanan berhasil diperbarui.');
    }

    /**
     * Hapus pesanan dari database (Biasanya hanya dilakukan untuk tujuan auditing).
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')
                         ->with('success', 'Pesanan berhasil dihapus.');
    }
    
    // Metode create/store tidak diperlukan karena pesanan dibuat oleh pengguna (checkout)
}