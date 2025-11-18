@extends('layouts.app')

@section('title', 'Pengaturan Sistem')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Pengaturan Sistem</h1>
    
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Settings</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-cogs me-1"></i> Konfigurasi Website
        </div>
        <div class="card-body">
            {{-- Form mengarah ke route UPDATE --}}
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                
                {{-- 1. Site Name --}}
                <div class="mb-3 row">
                    <label for="site_name" class="col-sm-3 col-form-label">Nama Toko / Website</label>
                    <div class="col-sm-9">
                        {{-- Mengambil value dari variabel $settings dengan key 'site_name' --}}
                        <input type="text" class="form-control" id="site_name" name="site_name" 
                               value="{{ $settings['site_name'] ?? '' }}">
                    </div>
                </div>

                {{-- 2. Currency --}}
                <div class="mb-3 row">
                    <label for="site_currency" class="col-sm-3 col-form-label">Mata Uang (Simbol)</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="site_currency" name="site_currency" 
                               value="{{ $settings['site_currency'] ?? 'IDR' }}">
                    </div>
                </div>

                {{-- 3. Contact Email --}}
                <div class="mb-3 row">
                    <label for="contact_email" class="col-sm-3 col-form-label">Email Kontak Admin</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="contact_email" name="contact_email" 
                               value="{{ $settings['contact_email'] ?? '' }}">
                    </div>
                </div>

                {{-- Tombol Simpan --}}
                <div class="row mt-4">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection