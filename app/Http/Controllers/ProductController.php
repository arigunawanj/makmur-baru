<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil seluruh data produk
        $product = Product::all();

        // Mengambil seluruh data kategori
        $category = Category::all();

        // Pergi ke halaman produk dengan membawa data produk dan kategori
        return view('produk', compact('product', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Memvalidasi data yang akan disimpan
        $data = $request->validate([
            'namaProduk' => 'required',
            'descProduk' => 'required',
            'harga' => 'required',
            'category_id' => 'required',
            'foto' => 'required|mimes:png,jpg',
        ]);

        // Mendeklar penyimpanan data ke dalam img
        $file = $request->file('foto')->store('img');

        // Merubah penyimpanan data ke dalam img
        $data['foto'] = $file;

        // Menyimpan data setelah berhasil di validasi
        Product::create($data);

        // Jika berhasil akan dialihkan ke halaman produk
        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Memvalidasi Data yang dibutuhkan
        $data = $request->validate([
            'namaProduk' => 'required',
            'descProduk' => 'required',
            'harga' => 'required',
            'category_id' => 'required',
            'foto' => 'required|mimes:png,jpg',
        ]);

        // Jika ingin mengganti foto yang ada
        if($request->hasFile('foto')) {
            
            // Penyimpanan foto akan di pindahkan ke folder img
            $file = $request->file('foto')->store('img');

            // Penyimpanan foto akan dirubah sesuai variabel file
            $data['foto'] = $file;

            // Jika sudah akan diupdate
            $product->update($data);
        } else {
            // Jika tidak ingin ada perubahan dalam foto maka data akan diupdate tanpa kolom foto
            $product->update([
                'namaProduk' => $request->namaProduk,
                'descProduk' => $request->descProduk,
                'harga' => $request->harga,
                'category_id' => $request->category_id,
            ]);
        }

        // Jika salah satu berhasil terpenuhi akan di alihkan ke halaman product
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // Menghapus Foto dalam folder
        Storage::delete($product->foto);

        // Menghapus data dalam tabel product
        $product->delete();

        // Jika berhasil akan dialihkan ke halaman product
        return redirect('product');
    }

    public function sembunyi(Product $product)
    {
        // Jika Tampil produk bernilai 1
        if($product->tampilProduk == 1){
            // maka tampil produk akan berganti nilai menjadi 0
            $product->update([
                'tampilProduk' => 0
            ]);
        } else {
            $product->update([
                'tampilProduk' => 1
            ]);
        }

        // Jika berhasil akan dialihkan ke halaman produk
        return redirect('product');
    }
}
