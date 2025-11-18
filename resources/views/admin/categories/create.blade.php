@extends('layouts.app') 

@section('title', 'Tambah Kategori')
@section('page_title', 'Form Tambah Kategori Game')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Masukkan Detail Kategori</h3>
            </div>
            
            <!-- Form akan dikirim ke CategoryController@store -->
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    
                    {{-- Nama Kategori --}}
                    <div class="form-group">
                        <label for="name">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" 
                               name="name" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               value="{{ old('name') }}" 
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
                                  placeholder="Deskripsi singkat mengenai jenis kategori ini.">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Kategori</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection