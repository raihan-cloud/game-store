@extends('layouts.app') @section('title', 'Dashboard') @section('page_title', 'Dashboard') @section('content') <div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>
                <p>Pesanan Baru</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Penjualan Naik</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-bar"></i>
            </div>
            <a href="#" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>44</h3>
                <p>User Terdaftar</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <a href="#" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>
                <p>Pengunjung Unik</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-pie"></i>
            </div>
            <a href="#" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    </div>
<div class="row">
    <section class="col-lg-7 connectedSortable">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-line mr-1"></i>
                    Grafik Penjualan
                </h3>
            </div>
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 300px;">
                         <h4 class="text-center p-5">Tempat Grafik Penjualan</h4>
                    </div>
                </div>
            </div>
        </div>
        </section>
    
    <section class="col-lg-5 connectedSortable">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-box-open mr-1"></i>
                    Produk Terbaru Ditambahkan
                </h3>
            </div>
            <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    <li class="item">
                        <div class="product-info">
                            <a href="#" class="product-title">Game AAA (Steam Key)
                                <span class="badge badge-warning float-right">Rp 750.000</span></a>
                            <span class="product-description">
                                Kategori: Action, RPG
                            </span>
                        </div>
                    </li>
                    <li class="item">
                        <div class="product-info">
                            <a href="#" class="product-title">Game Indie C (Steam Key)
                                <span class="badge badge-info float-right">Rp 150.000</span></a>
                            <span class="product-description">
                                Kategori: Puzzle, Adventure
                            </span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center">
                <a href="/admin/products" class="uppercase">Lihat Semua Produk</a>
            </div>
        </div>
    </section>
</div>

@endsection