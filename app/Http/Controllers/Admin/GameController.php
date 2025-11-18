<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Untuk upload/hapus file gambar

class GameController extends Controller
{
    /**
     * Tampilkan daftar semua game.
     */
    public function index()
    {
        $games = Game::all();
        // View ini (admin.games.index) adalah halaman tabel yang menampilkan list game
        return view('admin.games.index', compact('games'));
    }

    /**
     * Tampilkan form untuk membuat game baru.
     */
    public function create()
    {
        return view('admin.games.create');
    }

    /**
     * Simpan game baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Maks 2MB
        ]);

        // 2. Proses Upload Gambar (Jika ada)
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Simpan gambar di storage/app/public/images/games
            $imagePath = $request->file('image')->store('images/games', 'public');
        }

        // 3. Simpan Data Game
        Game::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath, // Simpan path gambar
        ]);

        return redirect()->route('admin.games.index')
                         ->with('success', 'Game berhasil ditambahkan!');
    }

    /**
     * Tampilkan form untuk mengedit game tertentu.
     */
    public function edit(Game $game)
    {
        return view('admin.games.edit', compact('game'));
    }

    /**
     * Perbarui game di database.
     */
    public function update(Request $request, Game $game)
    {
        // 1. Validasi Input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('title', 'description', 'price');

        // 2. Proses Perubahan Gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($game->image) {
                Storage::disk('public')->delete($game->image);
            }
            
            // Upload gambar baru
            $data['image'] = $request->file('image')->store('images/games', 'public');
        }

        // 3. Update Data Game
        $game->update($data);

        return redirect()->route('admin.games.index')
                         ->with('success', 'Game berhasil diperbarui!');
    }

    /**
     * Hapus game dari database.
     */
    public function destroy(Game $game)
    {
        // 1. Hapus Gambar (Jika ada)
        if ($game->image) {
            Storage::disk('public')->delete($game->image);
        }

        // 2. Hapus Data Game
        $game->delete();

        return redirect()->route('admin.games.index')
                         ->with('success', 'Game berhasil dihapus!');
    }
}