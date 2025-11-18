<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Category; // Model Category harus diimpor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Tampilkan daftar semua game.
     */
    public function index()
    {
        // Menggunakan with('category') agar relasi kategori ikut terload
        $games = Game::with('category')->latest()->get(); 
        return view('admin.games.index', compact('games'));
    }

    /**
     * Tampilkan form untuk membuat game baru.
     * FIX: Mengambil data kategori dan mengirimkannya ke view.
     */
    public function create()
    {
        try {
            // Ambil daftar kategori (name sebagai value, id sebagai key)
            $categories = Category::pluck('name', 'id');
            
            // Kirim variabel $categories ke view
            return view('admin.games.create', compact('categories'));

        } catch (\Exception $e) {
            // Jika ada kesalahan database (misalnya: tabel categories belum ada)
            // Tampilkan pesan error agar Anda tahu harus menjalankan 'php artisan migrate'
            return back()->with('error', "Error memuat Kategori: Pastikan Anda sudah menjalankan 'php artisan migrate' dan mengisi setidaknya satu data kategori. Detail: " . $e->getMessage());
        }
    }

    /**
     * Simpan game baru ke database.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'category_id' => 'required|exists:categories,id', // FIX: Validasi category_id
            'title' => 'required|string|max:255|unique:games,title',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // 2. Proses Upload Gambar (Jika ada)
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/games', 'public');
        }

        // 3. Simpan Data Game
        Game::create([
            'category_id' => $request->category_id, // FIX: Simpan category_id
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.games.index')
                         ->with('success', 'Game berhasil ditambahkan!');
    }

    /**
     * Tampilkan form untuk mengedit game tertentu.
     */
    public function edit(Game $game)
    {
        // FIX: Ambil dan kirim kategori ke view edit
        $categories = Category::pluck('name', 'id');
        return view('admin.games.edit', compact('game', 'categories'));
    }

    /**
     * Perbarui game di database.
     */
    public function update(Request $request, Game $game)
    {
        // 1. Validasi Input
        $request->validate([
            'category_id' => 'required|exists:categories,id', // FIX: Validasi category_id
            'title' => 'required|string|max:255|unique:games,title,' . $game->id, 
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only('category_id', 'title', 'description', 'price'); // FIX: Ambil category_id

        // 2. Proses Perubahan Gambar
        if ($request->hasFile('image')) {
            if ($game->image) {
                Storage::disk('public')->delete($game->image);
            }
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