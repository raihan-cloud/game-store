<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\GameStoreController; 
use App\Http\Controllers\PurchaseController;  

// Tambahkan Controller baru untuk Admin
use App\Http\Controllers\Admin\CategoryController; 
use App\Http\Controllers\Admin\OrderController; 
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController; 
use App\Http\Controllers\Admin\SettingController; 
use App\Http\Controllers\Admin\ProductKeyController; // Contoh untuk Kelola Kunci

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

Route::middleware(['auth', 'is.admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // 1. DASHBOARD
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); 
    })->name('dashboard'); 
    
    
    // KELOMPOK KATALOG
    // 2. Manage Games (CRUD)
    Route::resource('games', GameController::class); 

    // 3. Manage Categories (CRUD)
    Route::resource('categories', CategoryController::class); 
    
    // 4. Manage Product Keys (Stok Kunci Digital)
    Route::resource('keys', ProductKeyController::class); 


    // KELOMPOK TRANSAKSI & LAPORAN
    // 5. Manage Orders (CRUD)
    Route::resource('orders', OrderController::class);

    // 6. Sales Report
    Route::get('reports/sales', [ReportController::class, 'sales'])->name('reports.sales');


    // KELOMPOK SISTEM
    // 7. Manage Users (Full CRUD: Index, Create, Store, Edit, Update, Destroy)
    // PERUBAHAN ADA DI SINI: Saya menghapus ->only(...)
    Route::resource('users', UserController::class);
    
    // 8. System Settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');


});


require __DIR__.'/auth.php';