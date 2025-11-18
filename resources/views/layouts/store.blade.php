<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Game Store | @yield('title')</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/xxxxxx.js" crossorigin="anonymous"></script> 
    
    </head>
<body class="bg-gray-900 text-white antialiased min-h-full font-inter leading-relaxed">

    {{-- 1. Navbar (Fixed top-0) --}}
    @include('store.partials.navbar')

    {{-- 2. Spacer/Padding untuk menggeser konten dari bawah Navbar fixed --}}
    {{-- Tinggi h-16 cocok dengan tinggi navbar fixed --}}
    <div class="h-16"></div>

    {{-- 3. Konten Utama --}}
    <main>
        @yield('content')
    </main>

    {{-- 4. Footer --}}
    @include('store.partials.footer')
</body>
</html>