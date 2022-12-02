<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil Seluruh Data Kategori pada tabel Category
        $category = Category::all();

        // Pergi ke halaman Kategori dan membawa data pada tabel Category
        return view('kategori', compact('category'));
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
        // Memvalidasi 2 kolom sebelum disimpan
        $category = $request->validate([
            'namaKategori' => 'required',
            'descKategori' => 'required',
        ]);

        // Menyimpan data setelah validasi berhasil
        Category::create($category);

        // Setelah berhasil menyimpan akan dialihkan ke halaman kategori
        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // Mengupdate seluruh data dalam Form
        $category->update($request->all());

        // Jika berhasil akan dialihkan ke halaman category
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Menghapus data pada tabel kategori
        $category->delete();

        // Jika berhasil akan dialihkan ke halaman kategori
        return redirect('category');
    }
}
