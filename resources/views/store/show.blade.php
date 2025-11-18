@extends('layouts.store')

@section('title', $game->title)

@section('content')
<style>
    /* ===== CONTAINER ===== */
    .game-detail-section {
        max-width: 1100px;
        margin: 50px auto;
        padding: 0 1rem;
    }

    /* ===== MAIN CARD ===== */
    .game-card-main {
        background: linear-gradient(135deg, #ffffff 0%, #f5f3ff 100%);
        border-radius: 28px;
        box-shadow: 0 20px 60px rgba(102, 126, 234, 0.2);
        overflow: hidden;
        display: grid;
        grid-template-columns: 420px 1fr;
        gap: 0;
        border: 1px solid rgba(102, 126, 234, 0.1);
    }

    @media (max-width: 900px) {
        .game-detail-section { margin: 30px auto; }
        .game-card-main { 
            grid-template-columns: 1fr; 
            border-radius: 20px;
        }
    }

    /* ===== IMAGE SECTION ===== */
    .game-image-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 440px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .game-image-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), filter 0.4s ease;
    }

    .game-image-card:hover img {
        transform: scale(1.05);
        filter: brightness(1.1);
    }

    .img-placeholder {
        width: 280px;
        height: 280px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: rgba(255, 255, 255, 0.6);
        font-size: 2.5rem;
        text-align: center;
        border-radius: 20px;
        background: rgba(0, 0, 0, 0.2);
        font-weight: 500;
    }

    /* ===== BADGE ===== */
    .game-badge {
        position: absolute;
        left: 20px;
        top: 20px;
        background: linear-gradient(135deg, #ff6b6b 0%, #ff8e53 100%);
        box-shadow: 0 8px 20px rgba(255, 107, 107, 0.4);
        padding: 10px 20px;
        color: white;
        font-weight: 800;
        font-size: 0.85rem;
        border-radius: 50px;
        letter-spacing: 1px;
        z-index: 10;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* ===== INFO SECTION ===== */
    .game-info-card {
        padding: 50px 45px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    @media (max-width: 900px) {
        .game-info-card { padding: 30px 24px; }
    }

    @media (max-width: 600px) {
        .game-info-card { padding: 20px 16px; }
    }

    /* ===== TITLE ===== */
    .game-title-market {
        font-size: clamp(1.8rem, 5vw, 2.8rem);
        font-weight: 900;
        color: #2d3436;
        line-height: 1.15;
        margin-bottom: 20px;
        letter-spacing: -0.5px;
    }

    /* ===== PRICE ===== */
    .game-market-price {
        display: inline-block;
        margin-bottom: 25px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #ff6b6b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 2rem;
        font-weight: 900;
        letter-spacing: 0.5px;
    }

    /* ===== DESCRIPTION ===== */
    .game-desc-market {
        margin-bottom: 25px;
        background: linear-gradient(135deg, #f5f7fa 0%, #f0f2ff 100%);
        padding: 20px;
        border-radius: 12px;
        border-left: 5px solid #667eea;
        color: #555;
        font-size: 1.05rem;
        line-height: 1.7;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.1);
    }

    /* ===== FEATURES ===== */
    .market-features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 15px;
        margin-bottom: 30px;
        margin-top: 10px;
    }

    .market-feat-item {
        background: linear-gradient(135deg, #e8ebff 0%, #f5f0ff 100%);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.1);
        padding: 16px 12px;
        border-radius: 12px;
        text-align: center;
        color: #2d3436;
        font-weight: 700;
        font-size: 0.95rem;
        border: 2px solid rgba(102, 126, 234, 0.2);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }

    .market-feat-item i {
        color: #667eea;
        font-size: 1.5rem;
    }

    .market-feat-item:hover {
        border-color: #667eea;
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.2);
    }

    /* ===== ACTION BUTTONS ===== */
    .actions-market {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    @media (max-width: 900px) {
        .actions-market { 
            flex-direction: column;
            gap: 12px;
        }
    }

    .btn-market {
        flex: 1;
        min-width: 200px;
        padding: 16px 24px;
        font-size: 1.05rem;
        font-weight: 800;
        border-radius: 12px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        border: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        cursor: pointer;
        text-transform: uppercase;
    }

    .btn-market:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
    }

    .btn-market:active {
        transform: translateY(-1px);
    }

    .btn-market-outline {
        flex: 1;
        min-width: 200px;
        padding: 16px 24px;
        font-size: 1.05rem;
        font-weight: 800;
        border-radius: 12px;
        background: white;
        color: #667eea;
        border: 2px solid #667eea;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.1);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
        cursor: pointer;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-market-outline:hover {
        background: #f5f3ff;
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.2);
    }

    .btn-market-outline:active {
        transform: translateY(-1px);
    }

    /* ===== LOGIN ALERT ===== */
    .login-alert-market {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 12px;
        color: white;
        padding: 20px 24px;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        margin-top: 20px;
        font-weight: 600;
        font-size: 1.05rem;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .login-alert-market i {
        font-size: 1.3rem;
        flex-shrink: 0;
    }

    .login-alert-market a {
        color: #ffd89b;
        font-weight: 700;
        text-decoration: underline;
        transition: color 0.3s ease;
    }

    .login-alert-market a:hover {
        color: white;
    }

    /* ===== DIVIDER ===== */
    .divider {
        height: 2px;
        background: linear-gradient(90deg, #667eea 0%, transparent 50%, #764ba2 100%);
        margin: 25px 0;
        border: none;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 600px) {
        .game-card-main {
            grid-template-columns: 1fr;
        }

        .game-image-card {
            min-height: 300px;
        }

        .game-title-market {
            font-size: 1.5rem;
        }

        .game-market-price {
            font-size: 1.5rem;
        }

        .actions-market {
            margin-top: 20px;
        }

        .btn-market,
        .btn-market-outline {
            min-width: 100%;
            flex: 1;
        }

        .market-features {
            grid-template-columns: 1fr;
            gap: 12px;
        }
    }
</style>

<div class="game-detail-section">
    <div class="game-card-main">
        <!-- Image Section -->
        <div class="game-image-card">
            @if ($game->image)
                <img src="{{ asset('storage/' . $game->image) }}" alt="{{ $game->title }}">
            @else
                <div class="img-placeholder">
                    <div>
                        <i class="fas fa-gamepad"></i>
                        <p style="margin-top: 1rem; font-size: 0.9rem;">Tidak Ada Gambar</p>
                    </div>
                </div>
            @endif
            
            <div class="game-badge">
                <i class="fas fa-star"></i> POPULER
            </div>
        </div>

        <!-- Info Section -->
        <div class="game-info-card">
            <!-- Title -->
            <h1 class="game-title-market">{{ $game->title }}</h1>

            <!-- Price -->
            <div class="game-market-price">
                Rp{{ number_format($game->price, 0, ',', '.') }}
            </div>

            <hr class="divider">

            <!-- Description -->
            <div class="game-desc-market">
                {{ $game->description }}
            </div>

            <!-- Features -->
            <div class="market-features">
                <div class="market-feat-item">
                    <i class="fas fa-download"></i>
                    <span>Instant Download</span>
                </div>
                <div class="market-feat-item">
                    <i class="fas fa-shield-alt"></i>
                    <span>Aman & Terpercaya</span>
                </div>
                <div class="market-feat-item">
                    <i class="fas fa-headset"></i>
                    <span>Support 24/7</span>
                </div>
            </div>

            <hr class="divider">

            <!-- Action Buttons -->
            @auth
                <form action="{{ route('purchase.checkout', $game->id) }}" method="POST" style="width: 100%;">
                    @csrf
                    <div class="actions-market">
                        <button type="submit" class="btn-market">
                            <i class="fas fa-shopping-cart"></i> Beli Sekarang
                        </button>
                        <a href="{{ route('store') }}" class="btn-market-outline">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            @else
                <div class="login-alert-market">
                    <i class="fas fa-info-circle"></i>
                    <span>Silakan <a href="{{ route('login') }}">Login</a> untuk membeli game ini.</span>
                </div>
                <div class="actions-market" style="margin-top: 15px;">
                    <a href="{{ route('store') }}" class="btn-market-outline">
                        <i class="fas fa-arrow-left"></i> Kembali ke Katalog
                    </a>
                </div>
            @endauth
        </div>
    </div>
</div>

@endsection