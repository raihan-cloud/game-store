@extends('layouts.app')

@section('title', 'Edit Kategori')
@section('page_title', 'Form Edit Kategori Game: ' . $category->name)

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Perbarui Detail Kategori</h3>
            </div>
            
            <!-- Form akan dikirim ke CategoryController@update dengan method PATCH -->
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PATCH') {{-- Menggunakan method PATCH sesuai RESTful convention --}}
                
                <div class="card-body">
                    
                    {{-- Nama Kategori --}}
                    <div class="form-group">
                        <label for="name">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               value="{{ old('name', $category->name) }}" {{-- Menggunakan data lama jika ada error, jika tidak, gunakan data kategori saat ini --}}
                               placeholder="Contoh: RPG, Action, Indie">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="form-group">
                        <label for="description">Deskripsi (Opsional)</label>
                        <textarea name="description" 
                                  class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  rows="3" 
                                  placeholder="Deskripsi singkat mengenai jenis kategori ini.">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fas fa-sync-alt"></i> Perbarui Kategori</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection