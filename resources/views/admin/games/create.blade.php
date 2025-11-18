@extends('layouts.app')

@section('title', 'Tambah Game')
@section('page_title', 'Tambah Game Baru')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Game Baru</h3>
            </div>
            {{-- ATTRIBUTE enctype="multipart/form-data" SUDAH ADA DAN BENAR --}}
            <form action="{{ route('admin.games.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    
                    {{-- Pilih Kategori --}}
                    <div class="form-group">
                        <label for="category_id">Kategori Game <span class="text-danger">*</span></label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">-- Pilih Kategori --</option>
                            {{-- $categories datang dari GameController@create --}}
                            @foreach($categories as $id => $name)
                                <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   

                    {{-- Judul Game --}}
                    <div class="form-group">
                        <label for="title">Judul Game</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" 
                               placeholder="Masukkan judul game">
                        @error('title')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Harga --}}
                    <div class="form-group">
                        <label for="price">Harga (Rp)</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" 
                               id="price" name="price" value="{{ old('price') }}" 
                               placeholder="Contoh: 500000">
                        @error('price')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" name="description" rows="4" 
                                  placeholder="Masukkan deskripsi game...">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Upload Gambar --}}
                    <div class="form-group">
                        <label for="image">Gambar Cover</label>
                        <div class="input-group">
                            <div class="custom-file">
                                {{-- ATTRIBUTE name="image" SUDAH BENAR --}}
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" 
                                       id="image" name="image"> 
                                <label class="custom-file-label" for="image">Pilih file</label>
                            </div>
                        </div>
                        <small class="form-text text-muted">Format: jpg, jpeg, png. Maks: 2MB</small>
                        @error('image')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan Game</button>
                    <a href="{{ route('admin.games.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
        </div>
</div>

{{-- Script Tambahan untuk Nama File di Input File --}}
<script>
    // Menampilkan nama file yang dipilih di label custom-file
    document.querySelector('.custom-file-input').addEventListener('change', function(e){
        // Cek apakah ada file yang dipilih
        if (this.files && this.files.length > 0) {
            var fileName = this.files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        } else {
            // Reset label jika tidak ada file yang dipilih
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = 'Pilih file';
        }
    });
</script>
@endsection