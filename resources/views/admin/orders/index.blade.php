@extends('layouts.app') {{-- Ganti dengan layout admin Anda yang sebenarnya --}}

@section('title', 'Manajemen Pesanan')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Manajemen Pesanan Pelanggan</h1>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
        <div class="p-4 bg-gray-50 border-b">
            <h2 class="text-xl font-semibold text-gray-700">Daftar Pesanan</h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Pelanggan</th>
                        <th class="py-3 px-6 text-left">Total</th>
                        <th class="py-3 px-6 text-center">Status</th>
                        <th class="py-3 px-6 text-center">Tanggal Pesan</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach ($orders as $order)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap font-bold">#{{ $order->id }}</td>
                        <td class="py-3 px-6 text-left">
                            {{ $order->user->name ?? 'Pengguna Dihapus' }}
                            <span class="block text-xs text-gray-400">{{ $order->user->email ?? 'N/A' }}</span>
                        </td>
                        <td class="py-3 px-6 text-left text-green-600 font-semibold">
                            Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            <span class="py-1 px-3 rounded-full text-xs font-semibold 
                                @switch($order->status)
                                    @case('Paid') bg-green-200 text-green-800 @break
                                    @case('Completed') bg-blue-200 text-blue-800 @break
                                    @case('Failed') @case('Cancelled') bg-red-200 text-red-800 @break
                                    @default bg-yellow-200 text-yellow-800
                                @endswitch
                            ">
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{ $order->created_at->format('d M Y') }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm bg-indigo-500 hover:bg-indigo-600 text-white py-1 px-3 rounded-md transition duration-150">
                                Detail
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection