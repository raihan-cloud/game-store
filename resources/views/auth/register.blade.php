<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Game Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        body { fontFamily: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-950 min-h-screen flex items-center justify-center relative overflow-hidden py-12">

    <div class="absolute inset-0 bg-cover bg-center opacity-30 z-0" 
         style="background-image: url('https://images.unsplash.com/photo-1542751371-adc38627a71f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1632&q=80');">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-gray-900/80 via-gray-950/90 to-gray-950 z-0"></div>

    <div class="w-full max-w-md bg-gray-900/80 backdrop-blur-xl p-8 rounded-2xl shadow-2xl border border-white/10 relative z-10">
        
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-extrabold mb-2">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-purple-500">
                    Buat Akun Baru
                </span>
            </h1>
            <p class="text-sm text-gray-400">Bergabunglah dengan komunitas gamer terbesar.</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            
            @csrf

            <div class="mb-5">
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
                <input id="name" 
                       class="block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200 @error('name') border-red-500 @enderror" 
                       type="text" 
                       name="name" 
                       value="{{ old('name') }}" 
                       required 
                       autofocus 
                       placeholder="Gamer Sejati"
                />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                <input id="email" 
                       class="block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:ring-2 focus:ring-purple-500 transition duration-200 @error('email') border-red-500 @enderror" 
                       type="email" 
                       name="email" 
                       value="{{ old('email') }}"
                       required 
                       placeholder="gamer@example.com"
                />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                <input id="password" 
                       class="block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:ring-2 focus:ring-purple-500 transition duration-200 @error('password') border-red-500 @enderror"
                       type="password"
                       name="password"
                       required 
                       autocomplete="new-password"
                       placeholder="Minimal 8 karakter"
                />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-8">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">Konfirmasi Password</label>
                <input id="password_confirmation" 
                       class="block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:ring-2 focus:ring-purple-500 transition duration-200"
                       type="password"
                       name="password_confirmation"
                       required 
                       placeholder="Ulangi password"
                />
            </div>

            <button type="submit" 
                    class="w-full inline-flex justify-center items-center px-4 py-3.5 text-base font-bold text-white rounded-full
                           bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 
                           shadow-lg shadow-purple-500/30 transition-all duration-200 transform hover:-translate-y-0.5">
                Daftar Sekarang
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </button>
            
            <p class="text-center text-sm text-gray-500 mt-8">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="font-semibold text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-indigo-400 hover:from-teal-300 hover:to-indigo-300 transition duration-150">
                    Login di sini
                </a>
            </p>
        </form>
    </div>
</body>
</html>