@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h3 class="text-center mb-3 mt-2">Detail Post</h3>
                <div class="card">
                    <div class="card-header">Detail dari Post : <span class="badge bg-info">{{ $post->judul }}</span></div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Judul</th>
                                    <td>{{ $post->judul }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td><span class="badge bg-primary">{{ $post->tanggalDibuat }}</span></td>
                                </tr>
                                <tr>
                                    <th>Isi</th>
                                    <td>{{ $post->isi }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td><span class="badge bg-warning">{{ $post->category->namaKategori }}</span></td>
                                </tr>
                                <tr>
                                    <th>Penulis</th>
                                    <td><span class="badge bg-dark">{{ $post->user->name }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h3 class="text-center mt-3">Rekomendasi Jamu</h3>
                @foreach ($product as $item)
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/'. $item->foto) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="text-center">{{ $item->namaProduk }}</h4>
                            <p class="text-center"><span class="badge bg-primary">Rp. {{ $item->harga }}</span></p>
                            <p class="text-center"><span class="badge bg-danger">Kategori : {{ $item->category->namaKategori }}</span></p>
                            <p>{{ $item->descProduk }}</p>
                        </div>
                    </div>
                    
                @endforeach

            </div>
        </div>
    </div>
@endsection
