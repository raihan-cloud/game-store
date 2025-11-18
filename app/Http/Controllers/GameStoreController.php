<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameStoreController extends Controller
{
    /**
     * Menampilkan daftar game untuk semua pengunjung (Guest/Homepage).
     */
    public function index()
    {
        // Tampilkan semua game, bisa ditambahkan pagination jika game banyak
        $games = Game::latest()->paginate(12);

        // Asumsi view untuk guest ada di 'store.homepage'
        return view('store.homepage', compact('games'));
    }
    
    /**
     * Menampilkan halaman khusus Game Store setelah user berhasil login.
     * Ini sesuai dengan route 'store' yang kita definisikan sebelumnya.
     */
    public function userIndex()
    {
        // Logika tampilan bisa sama dengan index(), atau bisa menampilkan
        // game yang direkomendasikan khusus untuk user yang sudah login.
        $games = Game::latest()->paginate(12);

        // Asumsi view untuk user login ada di 'store.index'
        return view('store.index', compact('games'));
    }

    /**
     * Menampilkan detail spesifik satu game.
     */
    public function show(Game $game)
    {
        // Asumsi view detail ada di 'store.show'
        return view('store.show', compact('game'));
    }
}