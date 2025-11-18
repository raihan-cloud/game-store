<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\GameStoreController; 
use App\Http\Controllers\PurchaseController;  

/*
|--------------------------------------------------------------------------
| ROUTE UNTUK GUEST (NON-OTENTIKASI)
|--------------------------------------------------------------------------
*/

// Homepage - Menampilkan Katalog Game
Route::get('/', [GameStoreController::class, 'index'])->name('home'); 

// Detail Game
Route::get('/games/{game}', [GameStoreController::class, 'show'])->name('games.show'); 


/*
|--------------------------------------------------------------------------
| ROUTE OTENTIKASI (Butuh Login)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    
    // Halaman Katalog Game setelah User Login
    Route::get('/store', [GameStoreController::class, 'userIndex'])->name('store'); 
    
    // Checkout Game
    Route::post('/purchase/checkout/{game}', [PurchaseController::class, 'checkout'])->name('purchase.checkout');

    // Route Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| ROUTE ADMIN (Butuh Login & Role 'admin')
|--------------------------------------------------------------------------
*/

// Perhatikan grup ini sudah memiliki ->name('admin.')
// Jadi semua nama route di dalamnya otomatis diawali 'admin.'
Route::middleware(['auth', 'is.admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // 1. DASHBOARD ADMIN (PERBAIKAN UTAMA 1)
    // Kita ubah ini agar TIDAK menggunakan GameController.
    // Langsung tampilkan view dashboard saja.
    Route::get('/dashboard', function () {
        // Pastikan file view Anda ada di resources/views/dashboard.blade.php
        // Jika file ada di dalam folder admin, ubah jadi view('admin.dashboard')
        return view('admin.dashboard'); 
    })->name('dashboard'); // Hasil akhir nama: 'admin.dashboard'
    
    // 2. CRUD GAME (PERBAIKAN UTAMA 2)
    // Kita HAPUS 'except index' agar route 'admin.games.index' tercipta.
    // Ini akan membuat route: index, create, store, edit, update, destroy, show
    Route::resource('games', GameController::class); 

});


require __DIR__.'/auth.php';