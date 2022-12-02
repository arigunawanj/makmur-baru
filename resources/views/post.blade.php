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
                                    <th>Judul Post</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Isi</th>
                                    <th>Kategori</th>
                                    <th>Pengguna</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->tanggalDibuat }}</td>
                                        <td>{{ $item->isi }}</td>
                                        <td>{{ $item->category->namaKategori }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>
                                            <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editdata{{ $item->id }}">Edit</a>
                                            <a href="/post/{{ $item->id }}" class="btn btn-danger">Hapus</a>
                                            @if ($item->tampilPost == 1)
                                                <a href="sembunyipost/{{ $item->id }}" class="btn btn-secondary">Hide</a>
                                            @else
                                                <a href="sembunyipost/{{ $item->id }}" class="btn btn-info">Show</a>
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
                                                    <form action="{{ route('post.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="">Judul Postingan</label>
                                                            <input type="text" name="judul" value="{{ $item->judul }}" class="form-control" id="">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Tanggal Dibuat</label>
                                                            <input type="date" name="tanggalDibuat" value="{{ $item->tanggalDibuat }}" class="form-control" id="">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Isi</label>
                                                            <textarea name="isi" class="form-control" id="" cols="30" rows="10">{{ $item->isi }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="">Kategori</label>
                                                            <select name="category_id" class="form-select" id="">
                                                                @foreach ($category as $data)
                                                                    <option value="{{ $data->id }}" @selected($data->id == $item->category_id)>{{ $data->namaKategori }}</option>
                                                                @endforeach
                                                            </select>
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
                    <form action="{{ route('post.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Judul Postingan</label>
                            <input type="text" name="judul" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="">Tanggal Dibuat</label>
                            <input type="date" name="tanggalDibuat" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label for="">Isi</label>
                            <textarea name="isi" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Kategori</label>
                            <select name="category_id" class="form-select" id="">
                                @foreach ($category as $data)
                                    <option value="{{ $data->id }}">{{ $data->namaKategori }}</option>
                                @endforeach
                            </select>
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
