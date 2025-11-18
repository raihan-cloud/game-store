@extends('layouts.store')

@section('title', 'Katalog Game - Ribuan Game Menanti')

@section('content')
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #312e81 100%);
        min-height: 100vh;
    }

    .marketplace-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 2.5rem 1rem 3rem 1rem;
    }

    /* ===== HEADER SECTION ===== */
    .marketplace-header {
        background: linear-gradient(110deg, #6366f1 0%, #a855f7 50%, #ec4899 100%);
        padding: 3.5rem 2rem;
        border-radius: 24px;
        margin-bottom: 3rem;
        box-shadow: 0 20px 60px rgba(102, 126, 234, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.2);
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .marketplace-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent);
        border-radius: 50%;
    }

    .marketplace-header h1 {
        color: white;
        font-size: clamp(2.2rem, 6vw, 3.2rem);
        font-weight: 900;
        margin-bottom: 0.8rem;
        letter-spacing: -1px;
        position: relative;
        z-index: 2;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .marketplace-header p {
        color: rgba(255, 255, 255, 0.95);
        font-size: 1.2rem;
        font-weight: 500;
        position: relative;
        z-index: 2;
        letter-spacing: 0.3px;
    }

    /* ===== FILTER & SEARCH SECTION ===== */
    .filter-section {
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.08), rgba(168, 85, 247, 0.08));
        padding: 2.2rem;
        border-radius: 18px;
        margin-bottom: 2.8rem;
        border: 2px solid rgba(99, 102, 241, 0.15);
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 32px rgba(99, 102, 241, 0.1);
    }

    .filter-title {
        color: white;
        font-weight: 800;
        margin-bottom: 1.8rem;
        font-size: 1.15rem;
        letter-spacing: 0.5px;
    }

    .filter-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 0.6rem;
    }

    .filter-group label {
        color: #a5f3fc;
        font-weight: 700;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .filter-group input,
    .filter-group select {
        padding: 0.8rem 1.2rem;
        border: 2px solid rgba(99, 102, 241, 0.3);
        border-radius: 11px;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: rgba(255, 255, 255, 0.95);
        color: #1f2937;
        font-weight: 500;
    }

    .filter-group input::placeholder {
        color: #9ca3af;
    }

    .filter-group input:focus,
    .filter-group select:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99, 102, 234, 0.15);
        background: white;
    }

    .filter-buttons {
        display: flex;
        gap: 1.2rem;
        flex-wrap: wrap;
    }

    .btn-search {
        padding: 0.85rem 2.2rem;
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        color: white;
        border: none;
        border-radius: 11px;
        font-weight: 800;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 8px 20px rgba(99, 102, 234, 0.3);
        display: flex;
        align-items: center;
        gap: 0.7rem;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-search:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 32px rgba(99, 102, 234, 0.5);
        background: linear-gradient(135deg, #a855f7 0%, #ec4899 100%);
    }

    .btn-search:active {
        transform: translateY(-1px);
    }

    .btn-reset {
        padding: 0.85rem 2.2rem;
        background: rgba(255, 255, 255, 0.95);
        color: #6366f1;
        border: 2px solid #6366f1;
        border-radius: 11px;
        font-weight: 800;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        gap: 0.7rem;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-reset:hover {
        background: #f5f3ff;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(99, 102, 234, 0.2);
    }

    /* ===== TOOLBAR ===== */
    .toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .games-count {
        color: #e0e7ff;
        font-weight: 700;
        font-size: 1rem;
    }

    .games-count strong {
        color: #06b6d4;
        font-weight: 900;
    }

    /* ===== GAME GRID ===== */
    .games-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 2.2rem;
        margin-bottom: 3rem;
    }

    @media (max-width: 1200px) {
        .games-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.8rem;
        }
    }

    @media (max-width: 768px) {
        .games-grid {
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 1.4rem;
        }
    }

    /* ===== GAME CARD ===== */
    .game-card {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(245, 243, 255, 1) 100%);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        height: 100%;
        border: 2px solid transparent;
    }

    .game-card:hover {
        transform: translateY(-14px) scale(1.02);
        box-shadow: 0 24px 48px rgba(99, 102, 234, 0.35);
        border-color: #6366f1;
    }

    /* ===== GAME IMAGE ===== */
    .game-card-image {
        position: relative;
        width: 100%;
        height: 170px;
        overflow: hidden;
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
    }

    .game-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1), filter 0.4s ease;
    }

    .game-card:hover .game-card-image img {
        transform: scale(1.15);
        filter: brightness(1.15);
    }

    /* ===== BADGE ===== */
    .game-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        background: linear-gradient(135deg, #ff6b6b 0%, #ff8e53 100%);
        color: white;
        padding: 8px 14px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 800;
        box-shadow: 0 6px 16px rgba(255, 107, 107, 0.4);
        z-index: 10;
        text-transform: uppercase;
        letter-spacing: 0.6px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .game-badge.featured {
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        color: #78350f;
    }

    .game-badge.new {
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        color: white;
    }

    /* ===== CARD CONTENT ===== */
    .game-card-content {
        padding: 1.4rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .game-card-title {
        font-size: 1.05rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 0.6rem;
        line-height: 1.35;
        min-height: 2.7em;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .game-card-rating {
        display: flex;
        align-items: center;
        gap: 0.4rem;
        margin-bottom: 0.9rem;
        font-size: 0.85rem;
        color: #f59e0b;
    }

    .game-card-price {
        font-size: 1.4rem;
        font-weight: 900;
        background: linear-gradient(135deg, #6366f1, #a855f7, #ec4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1.2rem;
        margin-top: auto;
        letter-spacing: -0.5px;
    }

    .game-card-button {
        width: 100%;
        padding: 0.85rem 1rem;
        border: none;
        border-radius: 11px;
        background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        color: white;
        font-weight: 800;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        font-size: 0.95rem;
        box-shadow: 0 6px 16px rgba(99, 102, 234, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .game-card-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 28px rgba(99, 102, 234, 0.5);
        background: linear-gradient(135deg, #a855f7 0%, #ec4899 100%);
    }

    .game-card-button:active {
        transform: translateY(-1px);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: linear-gradient(135deg, rgba(99, 102, 234, 0.08), rgba(168, 85, 247, 0.08));
        border-radius: 16px;
        border: 2px dashed rgba(99, 102, 234, 0.3);
        grid-column: 1 / -1;
    }

    .empty-state-icon {
        font-size: 3.5rem;
        color: #6366f1;
        margin-bottom: 1.2rem;
    }

    .empty-state-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: #1f2937;
        margin-bottom: 0.6rem;
    }

    .empty-state-desc {
        color: #6b7280;
        margin-bottom: 2rem;
        font-size: 1.05rem;
    }

    /* ===== PAGINATION ===== */
    .pagination {
        display: flex;
        justify-content: center;
        gap: 0.6rem;
        margin-top: 3.2rem;
        flex-wrap: wrap;
    }

    .pagination a,
    .pagination span {
        padding: 0.8rem 1rem;
        border-radius: 10px;
        border: 2px solid rgba(99, 102, 234, 0.2);
        background: rgba(255, 255, 255, 0.9);
        color: #6366f1;
        font-weight: 700;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        font-size: 0.95rem;
    }

    .pagination a:hover {
        background: #6366f1;
        color: white;
        border-color: #6366f1;
        transform: translateY(-2px);
    }

    .pagination .active span {
        background: #6366f1;
        color: white;
        border-color: #6366f1;
    }

    .pagination .disabled span {
        color: #d1d5db;
        cursor: not-allowed;
    }

    /* ===== ALERT ===== */
    .alert-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        border-radius: 12px;
        padding: 1.2rem 1.5rem;
        margin-bottom: 1.6rem;
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
        display: flex;
        align-items: center;
        gap: 1rem;
        font-weight: 600;
        animation: slideInDown 0.4s ease;
    }

    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .marketplace-header {
            padding: 2rem 1rem;
        }

        .filter-section {
            padding: 1.5rem;
        }

        .filter-row {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .marketplace-container {
            padding: 1.5rem 1rem 2rem 1rem;
        }

        .filter-buttons {
            flex-direction: column;
            gap: 1rem;
        }

        .btn-search,
        .btn-reset {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 500px) {
        .marketplace-header h1 {
            font-size: 1.8rem;
        }

        .marketplace-header p {
            font-size: 1rem;
        }

        .games-grid {
            grid-template-columns: 1fr;
            gap: 1.2rem;
        }
    }
</style>

<!-- Header -->
<div class="marketplace-container">
    <div class="marketplace-header">
        <h1>🎮 Game Marketplace</h1>
        <p>Jutaan gamer memilih kami. Ribuan game, satu tempat!</p>
    </div>

    <!-- Filter & Search Section -->
    <div class="filter-section">
        <div class="filter-title">🔍 Cari & Filter Game Favoritmu</div>

        <form method="GET" action="{{ route('store') }}" class="w-100">
            <div class="filter-row">
                <div class="filter-group">
                    <label>Judul Game</label>
                    <input type="text" name="search" placeholder="Cari judul game..." value="{{ request('search') }}">
                </div>

                <div class="filter-group">
                    <label>Urutkan Berdasarkan</label>
                    <select name="sort">
                        <option value="latest" @if(request('sort') == 'latest') selected @endif>Terbaru</option>
                        <option value="price_low" @if(request('sort') == 'price_low') selected @endif>Harga: Terendah</option>
                        <option value="price_high" @if(request('sort') == 'price_high') selected @endif>Harga: Tertinggi</option>
                        <option value="popular" @if(request('sort') == 'popular') selected @endif>Paling Populer</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Genre</label>
                    <select name="genre">
                        <option value="">Semua Genre</option>
                        <option value="action" @if(request('genre') == 'action') selected @endif>Action</option>
                        <option value="adventure" @if(request('genre') == 'adventure') selected @endif>Adventure</option>
                        <option value="rpg" @if(request('genre') == 'rpg') selected @endif>RPG</option>
                        <option value="strategy" @if(request('genre') == 'strategy') selected @endif>Strategy</option>
                        <option value="simulation" @if(request('genre') == 'simulation') selected @endif>Simulation</option>
                        <option value="indie" @if(request('genre') == 'indie') selected @endif>Indie</option>
                    </select>
                </div>
            </div>

            <div class="filter-buttons">
                <button type="submit" class="btn-search">
                    <i class="fas fa-search"></i> Cari Game
                </button>
                <a href="{{ route('store') }}" class="btn-reset">
                    <i class="fas fa-redo"></i> Reset Filter
                </a>
            </div>
        </form>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <!-- Toolbar -->
    <div class="toolbar">
        <span class="games-count">
            📊 Menampilkan <strong>{{ $games->count() }}</strong> dari <strong>{{ $games->total() }}</strong> game
        </span>
    </div>

    <!-- Games Grid -->
    <div class="games-grid">
        @forelse ($games as $game)
            <div class="game-card">
                <div class="game-card-image">
                    @if ($game->image)
                        <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->title }}">
                    @else
                        <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6);">
                            <i class="fas fa-gamepad" style="font-size: 2.5rem;"></i>
                        </div>
                    @endif

                    <!-- Badge -->
                    @if ($game->is_featured)
                        <span class="game-badge featured">
                            <i class="fas fa-star"></i> Featured
                        </span>
                    @elseif ($game->created_at > now()->subDays(7))
                        <span class="game-badge new">
                            <i class="fas fa-bolt"></i> Baru
                        </span>
                    @endif
                </div>

                <div class="game-card-content">
                    <h3 class="game-card-title">{{ $game->title }}</h3>

                    <!-- Rating -->
                    <div class="game-card-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>(45 Reviews)</span>
                    </div>

                    <!-- Price -->
                    <div class="game-card-price">
                        Rp{{ number_format($game->price, 0, ',', '.') }}
                    </div>

                    <!-- Button -->
                    <a href="{{ route('games.show', $game->id) }}" class="game-card-button">
                        <i class="fas fa-shopping-cart"></i> Lihat Detail
                    </a>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-inbox"></i>
                </div>
                <h3 class="empty-state-title">Oops! Game Tidak Ditemukan</h3>
                <p class="empty-state-desc">Coba ubah filter atau kata kunci pencarian Anda untuk menemukan game yang diinginkan.</p>
                <a href="{{ route('store') }}" class="btn-search">
                    <i class="fas fa-redo"></i> Lihat Semua Game
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if ($games->hasPages())
        <div class="pagination">
            {{ $games->links() }}
        </div>
    @endif
</div>

@endsection