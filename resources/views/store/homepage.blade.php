@extends('layouts.store')

@section('title', 'Tujuan Akhir untuk Gaming Terbaik')

@section('content')

    <!-- SEKSI 0: HERO BANNER UTAMA (Cinema Look & High Impact CTA) -->
    <section class="relative h-[60vh] md:h-[80vh] flex items-center bg-gray-950 overflow-hidden border-b-4 border-purple-700/50">
        <!-- Background Image/Overlay -->
        <div class="absolute inset-0 bg-cover bg-center opacity-20"
             style="background-image: url('https://images.unsplash.com/photo-1542751371-adc38627a71f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1632&q=80');">
        </div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-gray-950/70 to-transparent"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-6xl md:text-8xl font-black mb-4 leading-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-indigo-400">
                    Dunia Game
                </span>
                Ada di Sini.
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto mb-8">
                Kunci digital instan, harga kompetitif, dan koleksi game terbesar. Mulai petualangan Anda tanpa batas.
            </p>
            <a href="{{ route('store') }}" class="inline-flex items-center px-12 py-4 text-xl font-bold rounded-full text-white
                        bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition duration-300
                        shadow-2xl shadow-purple-600/40 transform hover:scale-105 active:scale-100 ring-4 ring-indigo-500/50">
                <i class="fas fa-shopping-bag mr-3"></i> Jelajahi Katalog Sekarang
            </a>
        </div>
    </section>

    <!-- SEKSI 1: PILIHAN EDITOR / FEATURED GAMES (Glow Card & Gradient Background) -->
    <section class="py-20 px-4 bg-gray-900 border-b border-indigo-900/50">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-5xl font-extrabold mb-16 text-center text-white relative">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-purple-500">
                    Pilihan Editor Teratas
                </span>
                <i class="fas fa-fire ml-3 text-3xl text-red-500 animate-pulse"></i>
            </h2>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-8">
                @php
                    // Ambil 5 game
                    $popularGames = App\Models\Game::latest()->take(5)->get(); 
                @endphp

                @forelse ($popularGames as $game)
                    {{-- PREMIUM CARD STYLE --}}
                    <div class="group relative overflow-hidden rounded-xl shadow-2xl transition duration-500 transform hover:scale-[1.05] bg-gray-800 border border-indigo-900/50 hover:border-indigo-600/70 cursor-pointer
                                hover:shadow-indigo-600/50">
                        <a href="{{ route('games.show', $game->id) }}" class="absolute inset-0 z-10">
                            <span class="sr-only">Lihat {{ $game->title }}</span>
                        </a>
                        <div class="relative w-full h-48 sm:h-56">
                            @if ($game->image)
                                <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->title }}" class="w-full h-full object-cover transition duration-500 group-hover:opacity-90">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-700 text-gray-400">Gambar Tidak Ada</div>
                            @endif
                            <!-- Overlay Hover untuk Aksi Cepat -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                                <span class="text-white text-lg font-semibold px-4 py-2 rounded-full border border-white hover:bg-white hover:text-gray-900 transition duration-300">
                                    Lihat Detail
                                </span>
                            </div>
                        </div>
                        <div class="p-4 bg-gray-800">
                            <h3 class="text-xl font-bold text-white truncate">{{ $game->title }}</h3>
                            <p class="text-indigo-400 font-extrabold mt-1 text-lg">Rp{{ number_format($game->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500 py-4">Belum ada game yang bisa ditampilkan sebagai populer.</div>
                @endforelse
            </div>

            <div class="text-center mt-16">
                <a href="{{ route('store') }}" class="text-indigo-400 text-xl font-semibold transition duration-300 hover:text-purple-400 border-b-2 border-indigo-400/0 hover:border-purple-400 pb-1">
                    Jelajahi Semua Katalog &rarr;
                </a>
            </div>
        </div>
    </section>

    <hr class="border-gray-800">

    <!-- SEKSI 2: LAYANAN INTI KAMI (Services - Elevated Metallic Look) -->
    <section class="py-20 px-4 bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold mb-14 text-center text-gray-100">Kenapa Memilih Kami? 🛡️</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service Card 1 -->
                <div class="p-8 rounded-xl shadow-2xl text-center bg-gray-800 border border-gray-700 transition duration-300 hover:border-teal-400/50 hover:shadow-teal-800/20">
                    <i class="fas fa-bolt text-5xl bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-indigo-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-white mb-2">Aktivasi Instan</h3>
                    <p class="text-gray-400">Kode game dikirimkan dan bisa langsung digunakan tanpa menunggu lama setelah pembayaran terverifikasi.</p>
                </div>
                <!-- Service Card 2 -->
                <div class="p-8 rounded-xl shadow-2xl text-center bg-gray-800 border border-gray-700 transition duration-300 hover:border-indigo-400/50 hover:shadow-indigo-800/20">
                    <i class="fas fa-shield-alt text-5xl bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-purple-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-white mb-2">Keamanan Transaksi</h3>
                    <p class="text-gray-400">Semua transaksi dienkripsi, menjamin data pribadi dan pembayaran Anda 100% aman.</p>
                </div>
                <!-- Service Card 3 -->
                <div class="p-8 rounded-xl shadow-2xl text-center bg-gray-800 border border-gray-700 transition duration-300 hover:border-purple-400/50 hover:shadow-purple-800/20">
                    <i class="fas fa-headset text-5xl bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-red-400 mb-4"></i>
                    <h3 class="text-2xl font-bold text-white mb-2">Dukungan Premium</h3>
                    <p class="text-gray-400">Tim bantuan kami siap melayani Anda kapan saja untuk semua pertanyaan dan masalah teknis.</p>
                </div>
            </div>
        </div>
    </section>

    <hr class="border-gray-800">

    <!-- SEKSI 3: DAFTAR GAME TERBARU (Lebih Slim & Fokus) -->
    <section class="py-20 px-4 bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold mb-12 text-center text-gray-100">Game Terbaru Rilis 🚀</h2>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
                @php
                    // Ambil 6 game terbaru
                    $latestGames = App\Models\Game::orderBy('created_at', 'desc')->take(6)->get(); 
                @endphp

                @forelse ($latestGames as $game)
                    <div class="group relative overflow-hidden rounded-lg shadow-xl transition duration-300 transform hover:-translate-y-1 bg-gray-800/70 border border-gray-700 hover:border-teal-500/50">
                        <a href="{{ route('games.show', $game->id) }}" class="absolute inset-0 z-10">
                            <span class="sr-only">Lihat {{ $game->title }}</span>
                        </a>
                        <div class="relative w-full h-36 lg:h-48">
                            @if ($game->image)
                                <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->title }}" class="w-full h-full object-cover transition duration-300 group-hover:brightness-110">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-700 text-gray-400 text-sm">Rilis Baru</div>
                            @endif
                        </div>
                        <div class="p-3">
                            <h3 class="text-base font-semibold text-white truncate">{{ $game->title }}</h3>
                            <p class="text-green-400 text-sm font-bold mt-1">Rp{{ number_format($game->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500 py-4">Belum ada game terbaru.</div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('store') }}" class="inline-flex items-center px-8 py-3 text-lg font-medium rounded-full text-white
                    bg-gradient-to-r from-teal-600 to-green-600 hover:from-teal-700 hover:to-green-700 transition duration-300
                    shadow-lg hover:shadow-green-500/50 transform hover:scale-105">
                    <i class="fas fa-search mr-2"></i> Lihat Lebih Banyak
                </a>
            </div>

        </div>
    </section>

    <hr class="border-gray-800">

    <!-- SEKSI 4: CARA MEMBELI GAME (Step-by-Step with Animated Numbering) -->
    <section class="py-20 px-4 bg-gray-950">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold mb-14 text-center text-gray-100">Proses Pembelian Cepat & Mudah 💨</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                @php
                    $steps = [
                        ['icon' => 'fas fa-search', 'title' => '1. Temukan Game', 'desc' => 'Jelajahi katalog kami, manfaatkan filter, dan temukan game impian Anda.'],
                        ['icon' => 'fas fa-cart-plus', 'title' => '2. Selesaikan Pembayaran', 'desc' => 'Tambah ke keranjang dan bayar dengan metode yang Anda pilih secara aman.'],
                        ['icon' => 'fas fa-key', 'title' => '3. Terima Kunci Instan', 'desc' => 'Kunci digital akan langsung Anda dapatkan di email dan halaman akun Anda.'],
                        ['icon' => 'fas fa-gamepad', 'title' => '4. Mainkan Sekarang', 'desc' => 'Aktivasi kunci pada platform gaming (Steam, Epic, dll.) dan unduh.'],
                    ];
                @endphp

                @foreach ($steps as $index => $step)
                    <div class="text-center p-8 rounded-xl shadow-xl bg-gray-800 border border-gray-700 transition duration-300 hover:shadow-indigo-800/30 hover:bg-gray-700/50">
                        <div class="relative mb-6">
                            <!-- Large Number Overlay -->
                            <div class="absolute inset-0 flex items-center justify-center -top-4 opacity-5 pointer-events-none">
                                <span class="text-9xl font-extrabold text-indigo-400 opacity-20">{{ $index + 1 }}</span>
                            </div>
                            <i class="{{ $step['icon'] }} text-5xl bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-purple-400 relative z-10"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">{{ $step['title'] }}</h3>
                        <p class="text-gray-400 text-sm">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <hr class="border-gray-800">

    <!-- SEKSI 5: TESTIMONI PENGGUNA (Refined Testimonial Cards) -->
    <section class="py-20 px-4 bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-4xl font-bold text-center mb-14 text-gray-100">Apa Kata Pelanggan Kami? ⭐</h2>
            
            @php
                $testimonials = [
                    ['quote' => "Pelayanannya cepat, kodenya langsung masuk! Game Store adalah tempat wajib buat gamer.", 'name' => 'Budi S.', 'title' => 'Pembeli Terverifikasi', 'avatar' => 'https://placehold.co/100x100/1e293b/94a3b8?text=BS'],
                    ['quote' => "Pilihan game indie-nya lengkap banget. Antarmuka websitenya juga modern dan mudah digunakan.", 'name' => 'Siti A.', 'title' => 'Streamer Lokal', 'avatar' => 'https://placehold.co/100x100/374151/d1d5db?text=SA'],
                    ['quote' => "Harga bersaing, proses checkout super simpel. Adminnya juga ramah saat saya bertanya.", 'name' => 'Rizky M.', 'title' => 'Gamer Kasual', 'avatar' => 'https://placehold.co/100x100/4f46e5/e0e7ff?text=RM'],
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($testimonials as $testi)
                    <div class="bg-gray-800 p-6 rounded-xl shadow-2xl relative border-t-4 border-indigo-600 hover:shadow-indigo-500/30 transition duration-300">
                        <i class="fas fa-quote-left absolute top-3 left-4 text-4xl text-indigo-700 opacity-50"></i>
                        <blockquote class="text-lg italic text-gray-300 mb-4 pt-4">"{{ $testi['quote'] }}"</blockquote>
                        <div class="flex items-center mt-4">
                            <img src="{{ $testi['avatar'] }}" alt="{{ $testi['name'] }}" class="w-12 h-12 rounded-full object-cover mr-3 border-2 border-indigo-500">
                            <div>
                                <p class="font-semibold text-white">{{ $testi['name'] }}</p>
                                <p class="text-sm text-indigo-400">{{ $testi['title'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <hr class="border-gray-800">
    
    <!-- SEKSI 6: TENTANG KAMI (Clean Look) -->
    <section class="py-20 px-4 bg-gray-950">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 items-center">
            
            <div class="md:col-span-2 text-center md:text-left">
                <h2 class="text-4xl font-bold text-gray-100 mb-4">Tentang Game Store Kami</h2>
                <p class="text-gray-400 text-lg mb-6 border-l-4 border-indigo-600 pl-4">
                    Game Store didirikan dengan misi untuk menyediakan akses game digital yang mudah, cepat, dan terjangkau bagi komunitas gaming di Indonesia. Kami percaya bahwa setiap orang berhak menikmati hiburan digital terbaik tanpa hambatan. Kami menjamin **lisensi resmi** dan **aktivasi instan** untuk semua judul.
                </p>
                <p class="text-indigo-400 font-medium italic">Motto Kami: Mainkan Gairah Anda. 🎮</p>
            </div>
            
            <div class="bg-gray-800 p-6 rounded-xl shadow-lg text-center border border-indigo-700/50">
                <div class="mx-auto w-24 h-24 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-4xl mb-4 shadow-xl">
                    <i class="fas fa-user-tie text-white"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-1">Raihan, CEO</h3>
                <p class="text-indigo-400">Visi & Kepemimpinan</p>
                <p class="text-sm text-gray-500 mt-3">
                    "Saya membangun platform ini dari kecintaan terhadap game. Visi kami adalah menciptakan ekosistem gaming yang inklusif."
                </p>
            </div>

        </div>
    </section>

    <hr class="border-gray-800">
    
    <!-- SEKSI 7: FINAL CTA (Simplified Footer CTA) -->
    <div class="relative overflow-hidden flex items-center justify-center py-16 bg-gray-900">
        <div class="relative z-10 text-center max-w-4xl px-4">
            <h2 class="text-4xl font-extrabold mb-4 text-white">
                Siap untuk Bermain?
            </h2>
            <p class="text-gray-300 text-lg mb-8">
                Daftar sekarang untuk mendapatkan diskon eksklusif dan mulai koleksi game Anda.
            </p>
            <div class="space-x-4">
                @guest
                    <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3 text-lg font-bold rounded-full text-white
                        bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 transition duration-300
                        shadow-lg hover:shadow-purple-500/40 transform hover:scale-105">
                        <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
                    </a>
                @else
                    <a href="{{ route('store') }}" class="inline-flex items-center px-8 py-3 text-lg font-bold rounded-full text-white
                        bg-gradient-to-r from-green-500 to-teal-500 hover:from-green-600 hover:to-teal-600 transition duration-300
                        shadow-lg hover:shadow-teal-500/40 transform hover:scale-105">
                        <i class="fas fa-shopping-cart mr-2"></i> Lanjut Belanja
                    </a>
                @endguest
            </div>
        </div>
    </div>
    
@endsection