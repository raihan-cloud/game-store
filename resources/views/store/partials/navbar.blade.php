<nav class="bg-gray-800 shadow-xl fixed w-full z-20 top-0">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            {{-- Logo dan Nama Toko --}}
            <div class="flex">
                <a href="{{ route('home') }}" class="flex-shrink-0 flex items-center text-2xl font-bold text-indigo-400 hover:text-indigo-300 transition duration-150">
                    <i class="fas fa-gamepad mr-2"></i> Game Store
                </a>
            </div>

            {{-- Navigasi Tengah (Opsional) --}}
            <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                @auth
                    <a href="{{ route('store') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium flex items-center transition duration-150">
                        Katalog
                    </a>
                    {{-- Tambahkan link lain seperti 'Wishlist' atau 'My Library' di sini --}}
                @endauth
            </div>

            {{-- User / Guest Actions --}}
            <div class="flex items-center">
                @guest
                    <div class="hidden sm:flex sm:space-x-4">
                        <a href="{{ route('login') }}" class="text-white border border-indigo-500 hover:bg-indigo-600 px-4 py-2 rounded-lg text-sm font-medium transition duration-300">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="bg-indigo-600 text-white hover:bg-indigo-700 px-4 py-2 rounded-lg text-sm font-medium transition duration-300 transform hover:scale-105">
                            Daftar
                        </a>
                    </div>
                @else
                    {{-- Dropdown Menu (Menggunakan Tailwind/Alpine.js jika diinstal, atau cara dasar) --}}
                    <div x-data="{ open: false }" class="relative ml-3">
                        <div>
                            <button @click="open = !open" type="button" class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-800 p-1" id="user-menu-button">
                                <span class="sr-only">Open user menu</span>
                                <span class="text-white font-medium">{{ Auth::user()->name }}</span>
                                <i class="fas fa-caret-down ml-2 text-gray-400"></i>
                            </button>
                        </div>

                        {{-- Dropdown Content --}}
                        <div x-show="open" 
                             @click.outside="open = false" 
                             class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-gray-700 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none transition ease-out duration-200"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">

                            @if (Auth::user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-indigo-300 hover:bg-gray-600 transition duration-150" role="menuitem">
                                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard Admin
                                </a>
                                <div class="border-t border-gray-600 my-1"></div>
                            @endif
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-200 hover:bg-gray-600 transition duration-150" role="menuitem">
                                <i class="fas fa-user-circle mr-2"></i> Profil Saya
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-gray-600 transition duration-150" role="menuitem">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>
            
            {{-- Mobile menu button (jika diperlukan) --}}
            <div class="-mr-2 flex items-center sm:hidden">
                {{-- (Tombol Hamburger disini) --}}
            </div>
        </div>
    </div>
</nav>

{{-- Pastikan ada padding di konten utama agar tidak tertutup navbar fixed --}}
<div class="pt-16"></div>