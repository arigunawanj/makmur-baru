<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JamuController extends Controller
{
    public function HalUtama()
    {
        return view('jamu');
    }

    public function SimpanJamu(Request $request)
    {
        // Memanggil class induk dan mengambil nilai konstruct
        $jamu = new Saran($request->tahun, $request->keluhan);

        // Data keluaran
        $data = [
            'outkeluhan' => $request->keluhan,
            'namajamu' => $jamu->namaJamu(),
            'hasilkhasiat' => $jamu->khasiat(),
            'umur' => $jamu->tahunLahir(),
            'saran' => $jamu->saran(),
        ];

        // Jika data berhasil diinput, akan berpindah halaman dan membawa data yang telah diinputkan
        return view('jamu', compact('data'));
    }
}

class Jamu {

    // Deklarasi 2 construct
    public function __construct($tahun, $keluhan)
    {
        $this->tahun = $tahun;
        $this->keluhan = $keluhan;
    }

    // Menghitung Tahun lahir
    public function tahunLahir()
    {
        return date("Y") - $this->tahun;
    }

    // Mendeklarasi Nama Jamu yang didapat dari keluhan
    public function namaJamu()
    {
        if($this->keluhan == 'Keseleo' || $this->keluhan == 'Kurang Nafsu Makan'){
            return 'Beras Kencur';
        } else if($this->keluhan == 'Darah Tinggi' || $this->keluhan == 'Gula Darah'){
            return 'Brotowali';
        } else if($this->keluhan == 'Kram Perut' || $this->keluhan == 'Masuk Angin'){
            return 'Temulawak';
        } else if($this->keluhan == 'Pegal-Pegal'){
            return 'Kunyit Asam';
        } else {
            return 'Silahkan Diisi';
        }
    }

    // Mendeklarasi khasiat yang diambil dari fungsi NamaJamu()
    public function khasiat()
    {
        if($this->namaJamu() == 'Beras Kencur'){
            return 'Menambah Nafsu Makan';
        } else if($this->namaJamu() == 'Brotowali'){
            return 'Mengatasi Darah Tinggi';
        } else if($this->namaJamu() == 'Temulawak'){
            return 'Mengatasi Masuk Angin';
        } else if($this->namaJamu() == 'Kunyit Asam'){
            return 'Mengurangi Pegal-Pegal';
        } else {
            return 'Silahkan diisi';
        }
    }
}

class Saran extends Jamu {
    public function saran()
    {
        // Nilai Penampung
        $hasil = '';

        // Perhitungan Tahun Lahir jika kurang dari 10 Tahun
        if($this->tahunLahir() <= 10){
            $hasil = 'Dikonsumsi 1x';
        } else {
            $hasil = 'Dikonsumsi 2x';
        }

        // Kondisi ketika nama Jamu 'Beras Kencur' dan Keluhan 'Keseleo'
        if($this->namaJamu() == 'Beras Kencur' && $this->keluhan == 'Keseleo'){
            return $hasil . ' dan Dioleskan';
        } else {
            return $hasil . ' dan Dikonsumsi';
        }
    }
}
