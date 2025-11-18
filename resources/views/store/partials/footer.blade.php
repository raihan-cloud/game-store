<footer class="bg-gray-900 border-t border-gray-700 mt-12 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row justify-between items-center text-gray-400">
            
            {{-- Logo dan Copyright --}}
            <div class="mb-4 md:mb-0 text-center md:text-left">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-400 hover:text-indigo-300 transition duration-150">
                    🎮 Game Store
                </a>
                <p class="mt-2 text-sm">&copy; {{ date('Y') }} Game Store. All rights reserved.</p>
            </div>

            {{-- Navigasi Cepat (Contoh) --}}
            <div class="flex space-x-6 text-sm">
                <a href="#" class="hover:text-white transition duration-150">Tentang Kami</a>
                <a href="#" class="hover:text-white transition duration-150">Syarat & Ketentuan</a>
                <a href="#" class="hover:text-white transition duration-150">Bantuan</a>
            </div>

            {{-- Ikon Media Sosial (Opsional) --}}
            <div class="mt-4 md:mt-0 flex space-x-4 text-xl">
                <a href="#" class="hover:text-white transition duration-150"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-white transition duration-150"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-white transition duration-150"><i class="fab fa-instagram"></i></a>
            </div>

        </div>

    </div>
</footer>