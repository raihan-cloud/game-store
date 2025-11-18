@extends('layouts.store')

@section('title', $game->title)

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm">
                @if ($game->image)
                    <img src="{{ asset('storage/' . $game->image) }}" class="card-img-top" alt="{{ $game->title }}">
                @else
                    <div class="bg-light text-center py-5">[Gambar Tidak Tersedia]</div>
                @endif
            </div>
        </div>

        <div class="col-md-8">
            <h1>{{ $game->title }}</h1>
            <p class="lead text-success fw-bold fs-3">
                Harga: Rp{{ number_format($game->price, 0, ',', '.') }}
            </p>

            <hr>
            
            <p>{{ $game->description }}</p>

            <hr>

            @auth
                {{-- Form Beli: Arahkan ke rute Checkout/Purchase --}}
                <form action="{{ route('purchase.checkout', $game->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-lg btn-success">
                        <i class="fas fa-shopping-cart"></i> Beli Sekarang
                    </button>
                </form>
            @else
                <div class="alert alert-info">
                    Silakan <a href="{{ route('login') }}">Login</a> untuk membeli game ini.
                </div>
            @endauth

            <a href="{{ route('store') }}" class="btn btn-secondary mt-3">
                Kembali ke Katalog
            </a>
        </div>
    </div>
@endsection