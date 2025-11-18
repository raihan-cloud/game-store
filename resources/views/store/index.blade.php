@extends('layouts.store')

@section('title', 'Katalog Game')

@section('content')
    <h1 class="mb-4">Katalog Game Terbaru</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="row">
        @forelse ($games as $game)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    @if ($game->image)
                        <img src="{{ asset('storage/' . $game->image) }}" class="card-img-top" alt="{{ $game->title }}" style="height: 200px; object-fit: cover;">
                    @else
                        <div class="bg-light text-center py-5" style="height: 200px;">[Tidak Ada Gambar]</div>
                    @endif
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $game->title }}</h5>
                        <p class="card-text fw-bold text-success mt-auto">
                            Rp{{ number_format($game->price, 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="{{ route('games.show', $game->id) }}" class="btn btn-sm btn-primary w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">Belum ada game yang tersedia saat ini.</div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $games->links() }}
    </div>

@endsection