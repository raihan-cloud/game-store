<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductKey; // Asumsi Anda punya model ProductKey
use App\Models\Game; // Untuk dropdown game
use Illuminate\Http\Request;

class ProductKeyController extends Controller
{
    /**
     * Tampilkan daftar semua kunci produk (keys).
     */
    public function index()
    {
        $keys = ProductKey::with('game')->latest()->get();
        return view('admin.keys.index', compact('keys'));
    }

    /**
     * Tampilkan form untuk membuat kunci baru.
     */
    public function create()
    {
        $games = Game::pluck('title', 'id'); // Ambil daftar game untuk dropdown
        return view('admin.keys.create', compact('games'));
    }

    /**
     * Simpan kunci produk baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'key_code' => 'required|string|unique:product_keys,key_code',
            'is_used' => 'required|boolean',
        ]);

        ProductKey::create($request->all());

        return redirect()->route('admin.keys.index')
                         ->with('success', 'Kunci produk berhasil ditambahkan.');
    }

    // Metode show dan edit/update dan destroy akan serupa dengan CategoryController
    
    public function edit(ProductKey $key)
    {
        $games = Game::pluck('title', 'id');
        return view('admin.keys.edit', compact('key', 'games'));
    }

    public function update(Request $request, ProductKey $key)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'key_code' => 'required|string|unique:product_keys,key_code,' . $key->id,
            'is_used' => 'required|boolean',
        ]);

        $key->update($request->all());

        return redirect()->route('admin.keys.index')
                         ->with('success', 'Kunci produk berhasil diperbarui.');
    }

    public function destroy(ProductKey $key)
    {
        $key->delete();

        return redirect()->route('admin.keys.index')
                         ->with('success', 'Kunci produk berhasil dihapus.');
    }
}