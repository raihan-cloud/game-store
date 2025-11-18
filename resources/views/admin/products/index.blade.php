@extends('layouts.app') @section('title', 'Manage Games')
@section('page_title', 'Daftar Game')

@section('content')

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses!</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Data Game</h3>

                    <div class="card-tools">
                        <a href="{{ route('admin.games.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Game Baru
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($games as $game)
                                <tr>
                                    <td>{{ $game->id }}</td>
                                    <td>
                                        @if ($game->image)
                                            <img src="{{ asset('storage/' . $game->image) }}" 
                                                 alt="{{ $game->title }}" 
                                                 style="width: 100px; height: auto; border-radius: 5px;">
                                        @else
                                            <span class="text-muted text-sm">Tanpa Gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ $game->title }}</td>
                                    <td>Rp {{ number_format($game->price, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('admin.games.edit', $game) }}" class="btn btn-info btn-xs">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>

                                        <form action="{{ route('admin.games.destroy', $game) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs" 
                                                    onclick="return confirm('Anda yakin ingin menghapus game ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data game.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
    </div>

@endsection