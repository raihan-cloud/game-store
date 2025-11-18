<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah admin sudah ada untuk menghindari duplikat
        if (!User::where('email', 'teukualamfazianzyah@gmail.com')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'teukualamfaziansyah@gmail.com',
                'password' => Hash::make('password123'), // Password default, GANTI SETELAH LOGIN!
                'role' => 'admin', // Pastikan kolom 'role' ada di tabel users Anda
            ]);
            
            $this->command->info('Akun Admin berhasil dibuat!');
        } else {
            $this->command->warn('Akun Admin sudah ada.');
        }
    }
}