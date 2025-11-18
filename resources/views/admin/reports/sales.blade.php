@extends('layouts.app') {{-- Sesuaikan dengan nama file layout utama Anda --}}

@section('title', 'Laporan Penjualan')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Laporan Penjualan</h1>
    
    {{-- Breadcrumb --}}
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Laporan Penjualan</li>
    </ol>

    {{-- Kartu Filter (Opsional: Untuk memfilter tanggal) --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-filter me-1"></i> Filter Laporan
        </div>
        <div class="card-body">
            <form action="{{ route('admin.reports.sales') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="start_date" class="form-label">Dari Tanggal</label>
                    <input type="date" class="form-control" name="start_date" value="{{ request('start_date') }}">
                </div>
                <div class="col-md-4">
                    <label for="end_date" class="form-label">Sampai Tanggal</label>
                    <input type="date" class="form-control" name="end_date" value="{{ request('end_date') }}">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Kartu Tabel Data --}}
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i> Data Penjualan (Status: Paid)
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Order</th>
                            <th>Nama Pelanggan</th>
                            <th>Total Pembayaran</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y H:i') }}</td>
                            <td>
                                {{-- Cek apakah relasi user ada --}}
                                {{ $order->user ? $order->user->name : 'Guest' }}
                            </td>
                            <td>Rp {{ number_format($order->total_price ?? $order->grand_total, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge bg-success">{{ $order->status }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data penjualan pada periode ini.</td>
                        </tr>
                        @endforelse
                    </tbody>
                    {{-- Footer Total (Opsional) --}}
                    @if($orders->count() > 0)
                    <tfoot>
                        <tr class="fw-bold">
                            <td colspan="3" class="text-end">Total Pendapatan:</td>
                            <td colspan="2">
                                Rp {{ number_format($orders->sum('total_price') ?? $orders->sum('grand_total'), 0, ',', '.') }}
                            </td>
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection