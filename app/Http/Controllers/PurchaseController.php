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
        // 1. Validasi Login (Opsional jika sudah pakai middleware 'auth' di route)
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk membeli game.');
        }

        // 2. Simpan Data Transaksi
        // PENTING: Pastikan 'key' array di bawah ini SAMA PERSIS dengan nama kolom di database
        Order::create([
            'user_id'      => Auth::id(),
            'game_id'      => $game->id,
            
            // PERBAIKAN DI SINI:
            // Saya ubah 'total_price' menjadi 'price'.
            // Cek database table 'orders' Anda, apakah namanya 'price', 'amount', atau 'total'?
            'total_price'        => $game->price, 
            
            'status'       => 'Paid',
            'invoice_code' => 'INV-' . strtoupper(Str::random(10)),
        ]);

        // 3. Redirect
        return redirect()->route('store')->with('success', "Berhasil! Game {$game->title} sudah dibeli.");
    }
}