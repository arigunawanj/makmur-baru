@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            {{-- KOLOM 1 --}}
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Isi Data</div>
                    <div class="card-body">
                        <form action="simpanjamu" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Keluhan</label>
                                <select name="keluhan" class="form-select" id="">
                                    <option selected>Pilih Keluhan....</option>
                                    <option value="Keseleo">Keseleo</option>
                                    <option value="Kurang Nafsu Makan">Kurang Nafsu Makan</option>
                                    <option value="Darah Tinggi">Darah Tinggi</option>
                                    <option value="Gula Darah">Gula Darah</option>
                                    <option value="Kram Perut">Kram Perut</option>
                                    <option value="Masuk Angin">Masuk Angin</option>
                                    <option value="Pegal-Pegal">Pegal-Pegal</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Tahun Lahir</label>
                                <select name="tahun" class="form-select" id="">
                                    <option selected>Pilih Tahun Lahir...</option>
                                    @for ($i = 1945; $i <= date("Y"); $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- KOLOM 2 --}}
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Rekomendasi Jamu</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($data)
                                <tr>
                                    <th>Nama Jamu</th>
                                    <td>{{ $data['namajamu'] }}</td>
                                </tr>
                                <tr>
                                    <th>Khasiat</th>
                                    <td>{{ $data['hasilkhasiat'] }}</td>
                                </tr>
                                <tr>
                                    <th>Keluhan</th>
                                    <td>{{ $data['outkeluhan'] }}</td>
                                </tr>
                                <tr>
                                    <th>Umur</th>
                                    <td>{{ $data['umur'] }}</td>
                                </tr>
                                <tr>
                                    <th>Saran</th>
                                    <td>{{ $data['saran'] }}</td>
                                </tr>
                                    
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
