<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Game Store</title>
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
<body class="bg-gray-950 min-h-screen flex items-center justify-center relative overflow-hidden">

    <!-- Background Visuals (Matches Landing Page Hero) -->
    <div class="absolute inset-0 bg-cover bg-center opacity-30 z-0" 
         style="background-image: url('https://images.unsplash.com/photo-1542751371-adc38627a71f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1632&q=80');">
    </div>
    <!-- Dark Overlay Gradient -->
    <div class="absolute inset-0 bg-gradient-to-b from-gray-900/80 via-gray-950/90 to-gray-950 z-0"></div>

    <!-- Main Card Container -->
    <div class="w-full max-w-md bg-gray-900/80 backdrop-blur-lg p-8 md:p-10 rounded-2xl shadow-2xl shadow-indigo-500/20 border border-white/10 relative z-10 transform transition-all duration-300 hover:scale-[1.01]">
        
        <!-- Header Section -->
        <div class="mb-8 text-center">
            <h1 class="text-4xl font-extrabold mb-2">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-indigo-500">
                    Welcome Back
                </span>
            </h1>
            <p class="text-sm text-gray-400">Lanjutkan petualangan gaming Anda.</p>
        </div>

        <!-- Session Status Placeholder -->
        <div id="session-status" class="hidden mb-4 text-sm font-medium text-green-400 p-3 rounded-lg bg-green-900/30 border border-green-500/30">
            </div>

        <form method="POST" action="/login">
            @csrf <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>

        <form method="POST" action="/login">
            <!-- Email Address -->
            <div class="mb-5">
                <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                <input id="email" 
                       class="block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200" 
                       type="email" 
                       name="email" 
                       required 
                       autofocus 
                       autocomplete="username" 
                       placeholder="gamer@example.com"
                />
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                <input id="password" 
                       class="block w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-200"
                       type="password"
                       name="password"
                       required 
                       autocomplete="current-password"
                       placeholder="••••••••"
                />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between mb-8">
                <!-- Remember Me -->
                <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                    <input id="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 border-gray-600 rounded bg-gray-700 focus:ring-indigo-500 focus:ring-offset-gray-900 transition duration-150" name="remember">
                    <span class="ms-2 text-sm text-gray-400 group-hover:text-gray-300 transition duration-150 select-none">Ingat saya</span>
                </label>

                <!-- Forgot Password Link -->
                <a class="text-sm font-medium text-indigo-400 hover:text-indigo-300 transition duration-150" 
                   href="/forgot-password">
                    Lupa password?
                </a>
            </div>

            <!-- Submit Button (Gradient Style) -->
            <button type="submit" 
                    class="w-full inline-flex justify-center items-center px-4 py-3.5 text-base font-bold text-white rounded-full
                           bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 
                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:ring-offset-gray-900
                           shadow-lg shadow-indigo-500/30 hover:shadow-indigo-500/50 transform hover:-translate-y-0.5 transition-all duration-200">
                Log In
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 -mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
            </button>
            
            <!-- Register Link -->
             <p class="text-center text-sm text-gray-500 mt-8">
                Belum punya akun? 
                <a href="/register" class="font-semibold text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-indigo-400 hover:from-teal-300 hover:to-indigo-300 transition duration-150">
                    Daftar Sekarang
                </a>
            </p>
        </form>
    </div>
</body>
</html>