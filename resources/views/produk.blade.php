@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <a class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahdata">Tambah
                    Data</a>
                <div class="card">
                    <div class="card-header">Data Kategori</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi Produk</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->namaProduk }}</td>
                                        <td>{{ $item->descProduk }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>{{ $item->category->namaKategori }}</td>
                                        <td><img src="{{ asset('storage/'. $item->foto) }}" width="100px" alt="" srcset=""></td>
                                        <td>
                                            <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editdata{{ $item->id }}">Edit</a>
                                            <a href="/product/{{ $item->id }}" class="btn btn-danger">Hapus</a>
                                            @if ($item->tampilProduk == 1)
                                                <a href="sembunyiproduk/{{ $item->id }}" class="btn btn-secondary">Hide</a>
                                            @else
                                                <a href="sembunyiproduk/{{ $item->id }}" class="btn btn-info">Show</a>
                                            @endif
                                        </td>
                                    </tr>

                                    {{-- Modal Edit --}}
                                    <!-- Modal -->
                                    <div class="modal fade" id="editdata{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kategori
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="">Nama Produk</label>
                                                            <input type="text" name="namaProduk" value="{{ $item->namaProduk }}" class="form-control" id="">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Deskripsi Produk</label>
                                                            <textarea name="descProduk" class="form-control" id="" cols="20" rows="10">{{ $item->descProduk }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Harga</label>
                                                            <input type="number" name="harga" class="form-control" value="{{ $item->harga }}" id="">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Kategori</label>
                                                            <select name="category_id" class="form-select" id="">
                                                                @foreach ($category as $data)
                                                                    <option value="{{ $data->id }}" @selected($data->id == $item->category_id)>{{ $data->namaKategori }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Foto</label>
                                                            <input type="file" class="form-control" name="foto" id="">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <!-- Modal -->
    <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Nama Produk</label>
                            <input type="text" name="namaProduk" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="">Deskripsi Produk</label>
                            <textarea name="descProduk" class="form-control" id="" cols="20" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Harga</label>
                            <input type="number" name="harga" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="">Kategori</label>
                            <select name="category_id" class="form-select" id="">
                                @foreach ($category as $data)
                                    <option value="{{ $data->id }}">{{ $data->namaKategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Foto</label>
                            <input type="file" class="form-control" name="foto" id="">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
