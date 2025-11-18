@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit User</h1>
    
    {{-- Breadcrumb Navigasi --}}
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">Edit User</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user-edit me-1"></i> Form Edit Data Pengguna
        </div>
        <div class="card-body">
            
            {{-- Form mengarah ke route UPDATE (PUT) --}}
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- PENTING: Ubah method POST menjadi PUT untuk update --}}

                {{-- Baris 1: Nama & Email --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            {{-- old('name', $user->name) artinya: Tampilkan input terakhir user jika error, jika tidak ada error tampilkan data dari database --}}
                            <input class="form-control @error('name') is-invalid @enderror" 
                                   id="inputName" 
                                   type="text" 
                                   name="name" 
                                   value="{{ old('name', $user->name) }}" 
                                   required />
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
                                   value="{{ old('email', $user->email) }}" 
                                   required />
                            <label for="inputEmail">Alamat Email</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Baris 2: Password (Opsional) --}}
                <div class="row mb-3">
                    <div class="col-md-12 mb-2">
                        <div class="alert alert-info py-2">
                            <small><i class="fas fa-info-circle me-1"></i> Kosongkan kolom password di bawah ini jika Anda tidak ingin mengubah password user.</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control @error('password') is-invalid @enderror" 
                                   id="inputPassword" 
                                   type="password" 
                                   name="password" 
                                   placeholder="Password Baru" />
                            <label for="inputPassword">Password Baru (Opsional)</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" 
                                   id="inputPasswordConfirm" 
                                   type="password" 
                                   name="password_confirmation" 
                                   placeholder="Konfirmasi Password" />
                            <label for="inputPasswordConfirm">Konfirmasi Password Baru</label>
                        </div>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-4 mb-0">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary me-md-2">Batal</a>
                        <button type="submit" class="btn btn-primary">Update Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection