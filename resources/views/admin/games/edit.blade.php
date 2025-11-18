@extends('layouts.app')

@section('title', 'Edit Game')
@section('page_title', 'Edit Game')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Game: {{ $game->title }}</h3>
            </div>
            
            <!-- Form Edit -->
            <!-- Action mengarah ke route update dengan ID game -->
            <form action="{{ route('admin.games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- PENTING: Mengubah method POST menjadi PUT untuk update data --}}
                
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
                   
                <div class="card-body">
                    {{-- Judul Game --}}
                    <div class="form-group">
                        <label for="title">Judul Game</label>
                        <!-- Value diambil dari old input (jika validasi gagal) ATAU dari data database ($game->title) -->
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" 
                               value="{{ old('title', $game->title) }}" 
                               placeholder="Masukkan judul game">
                        @error('title')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Harga --}}
                    <div class="form-group">
                        <label for="price">Harga (Rp)</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" 
                               id="price" name="price" 
                               value="{{ old('price', $game->price) }}" 
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
                                  placeholder="Masukkan deskripsi game...">{{ old('description', $game->description) }}</textarea>
                        @error('description')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Gambar --}}
                    <div class="form-group">
                        <label for="image">Gambar Cover (Biarkan kosong jika tidak ingin mengubah)</label>
                        
                        {{-- Tampilkan gambar saat ini jika ada --}}
                        @if($game->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $game->image) }}" alt="Current Image" style="width: 100px; border-radius: 4px; border: 1px solid #ddd; padding: 2px;">
                                <p class="text-muted text-sm mt-1">Gambar saat ini</p>
                            </div>
                        @endif

                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image') is-invalid @enderror" 
                                       id="image" name="image">
                                <label class="custom-file-label" for="image">Pilih file baru (Opsional)</label>
                            </div>
                        </div>
                        <small class="form-text text-muted">Format: jpg, jpeg, png. Maks: 2MB</small>
                        @error('image')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('admin.games.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Menampilkan nama file yang dipilih
    document.querySelector('.custom-file-input').addEventListener('change', function(e){
        var fileName = document.getElementById("image").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>
@endsection