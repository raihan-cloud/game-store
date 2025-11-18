@extends('layouts.app')

@section('title', 'Tambah User Baru')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah User Baru</h1>
    
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">Tambah Baru</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user-plus me-1"></i> Formulir User Baru
        </div>
        <div class="card-body">
            {{-- Form mengarah ke method STORE di UserController --}}
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf {{-- Token keamanan wajib Laravel --}}

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control @error('name') is-invalid @enderror" 
                                   id="inputName" 
                                   type="text" 
                                   name="name" 
                                   placeholder="Masukkan nama lengkap" 
                                   value="{{ old('name') }}" required />
                            <label for="inputName">Nama Lengkap</label>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control @error('email') is-invalid @enderror" 
                                   id="inputEmail" 
                                   type="email" 
                                   name="email" 
                                   placeholder="name@example.com" 
                                   value="{{ old('email') }}" required />
                            <label for="inputEmail">Alamat Email</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control @error('password') is-invalid @enderror" 
                                   id="inputPassword" 
                                   type="password" 
                                   name="password" 
                                   placeholder="Buat password" required />
                            <label for="inputPassword">Password</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            {{-- name="password_confirmation" wajib agar fitur 'confirmed' Laravel bekerja --}}
                            <input class="form-control" 
                                   id="inputPasswordConfirm" 
                                   type="password" 
                                   name="password_confirmation" 
                                   placeholder="Konfirmasi password" required />
                            <label for="inputPasswordConfirm">Konfirmasi Password</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 mb-0">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary me-md-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection