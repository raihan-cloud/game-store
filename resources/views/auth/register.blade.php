<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Game Store</title>
    <!-- Load Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom font */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-950 min-h-screen flex items-center justify-center relative overflow-hidden py-12">

    <!-- Background Visuals (Matches Login & Landing Page) -->
    <div class="absolute inset-0 bg-cover bg-center opacity-30 z-0" 
         style="background-image: url('https://images.unsplash.com/photo-1542751371-adc38627a71f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1632&q=80');">
    </div>
    <!-- Dark Overlay Gradient -->
    <div class="absolute inset-0 bg-gradient-to-b from-gray-900/80 via-gray-950/90 to-gray-950 z-0"></div>

    <!-- Main Card Container -->
    <div class="w-full max-w-md bg-gray-900/80 backdrop-blur-xl p-8 rounded-2xl shadow-2xl shadow-purple-500/20 border border-white/10 relative z-10 transform transition-all duration-300 hover:scale-[1.005]">
        
        <!-- Header Section -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-extrabold mb-2">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-purple-500">
                    Buat Akun Baru
                </span>
            </h1>
            <p class="text-sm text-gray-400">Bergabunglah dengan komunitas gamer terbesar.</p>
        </div>

        <form method="POST" action="/register">
            <!-- Nama Lengkap -->
            <div class="mb-5">
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
                <input id="name" 
                       class="block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                       type="text" 
                       name="name" 
                       required 
                       autofocus 
                       autocomplete="name" 
                       placeholder="Gamer Sejati"
                />
            </div>

            <!-- Email Address -->
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                <input id="email" 
                       class="block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200" 
                       type="email" 
                       name="email" 
                       required 
                       autocomplete="username" 
                       placeholder="gamer@example.com"
                />
            </div>

            <!-- Password -->
            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                <input id="password" 
                       class="block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                       type="password"
                       name="password"
                       required 
                       autocomplete="new-password"
                       placeholder="Minimal 8 karakter"
                />
            </div>

            <!-- Confirm Password -->
            <div class="mb-8">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">Konfirmasi Password</label>
                <input id="password_confirmation" 
                       class="block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"
                       type="password"
                       name="password_confirmation"
                       required 
                       autocomplete="new-password"
                       placeholder="Ulangi password"
                />
            </div>

            <!-- Submit Button (Gradient Style) -->
            <button type="submit" 
                    class="w-full inline-flex justify-center items-center px-4 py-3.5 text-base font-bold text-white rounded-full
                           bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 
                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 focus:ring-offset-gray-900
                           shadow-lg shadow-purple-500/30 hover:shadow-purple-500/50 transform hover:-translate-y-0.5 transition-all duration-200">
                Daftar Sekarang
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 -mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
            </button>
            
            <!-- Login Link -->
             <p class="text-center text-sm text-gray-500 mt-8">
                Sudah punya akun? 
                <a href="/login" class="font-semibold text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-indigo-400 hover:from-teal-300 hover:to-indigo-300 transition duration-150">
                    Login di sini
                </a>
            </p>
        </form>
    </div>
</body>
</html>