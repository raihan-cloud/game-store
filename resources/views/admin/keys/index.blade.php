@extends('layouts.app') {{-- Ganti dengan layout admin Anda yang sebenarnya --}}

@section('title', 'Manajemen Kunci Produk')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Daftar Kunci Produk</h1>

    {{-- Tombol untuk menambahkan kunci baru (jika ada) --}}
    <div class="mb-4">
        <a href="{{ route('admin.keys.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Kunci Baru
        </a>
    </div>

    {{-- Tabel untuk menampilkan data --}}
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Kunci Produk
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Game
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Digunakan
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keys as $key)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $key->key_value }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{ $key->game->title ?? 'N/A' }}
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <span class="relative inline-block px-3 py-1 font-semibold leading-tight @if($key->is_used) text-red-900 bg-red-200 @else text-green-900 bg-green-200 @endif rounded-full">
                            <span aria-hidden="true" class="absolute inset-0 @if($key->is_used) opacity-50 bg-red-400 @else opacity-50 bg-green-400 @endif rounded-full"></span>
                            <span class="relative">{{ $key->is_used ? 'Ya' : 'Tidak' }}</span>
                        </span>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        {{-- Tambahkan tombol aksi di sini --}}
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                        <a href="#" class="text-red-600 hover:text-red-900">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection