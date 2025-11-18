<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PurchaseController extends Controller
{
    public function checkout(Request $request, Game $game)
    {
        // 1. Validasi Login (Meskipun sudah ada middleware auth, ini untuk keamanan ganda)
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk membeli game.');
        }

        // 2. Simpan Data Transaksi ke Tabel 'orders'
        Order::create([
            'user_id'      => Auth::id(), // ID User yang sedang login
            'game_id'      => $game->id,  // ID Game yang dibeli
            // Jika di tabel orders kolom harganya bernama 'total_price':
            'total_price'  => $game->price, 
            // Jika di tabel orders kolom harganya bernama 'grand_total' (sesuaikan dengan database anda):
            // 'grand_total' => $game->price, 
            
            'status'       => 'Paid',     // Status langsung lunas
            'invoice_code' => 'INV-' . strtoupper(Str::random(10)), // Kode invoice acak
        ]);

        // 3. Redirect kembali ke halaman katalog dengan pesan sukses
        return redirect()->route('store')->with('success', 'Berhasil! Game ' . $game->title . ' sudah dibeli.');
    }
}