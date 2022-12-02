@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($post as $item)
                <div class="card ms-3 mt-3" style="width: 25rem;">
                    <div class="card-header text-center">
                        {{ $item->judul }}
                    </div>
                    <div class="card-body">
                        <p>Tanggal Rilis : <cite class="badge bg-secondary">{{ $item->tanggalDibuat }}</cite></p>
                        <p>Kategori :  <span class="badge bg-warning">{{ $item->category->namaKategori }}</span></p>
                        <blockquote class="blockquote mb-0">
                            <p>{{Str::limit($item->isi, 150) }}</p>
                            <footer class="blockquote-footer">Penulis : <cite title="Source Title">{{ $item->user->name }}</cite>
                            </footer>
                        </blockquote>
                    </div>
                    <div class="card-footer d-grid">
                        <a href="detail/{{ $item->id }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>

    <footer>
        <div class="container">
            <p class="text-center">Wes Makmur &copy; 2022</p>
        </div>
    </footer>
@endsection
