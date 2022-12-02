<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil Seluruh data dalam tabel Post
        $post = Post::all();

        // Mengambil seluruh data dalam tabel kategori
        $category = Category::all();

        // Pergi ke halaman post dan membawa data dari Variabel Category dan Post
        return view('post', compact('post', 'category'));
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
        // Memvalidasi data yang dibutuhkan
        $data = $request->all();

        // Merubah value user_id menjadi yang login saja
        $data['user_id'] = Auth::user()->id;

        // Jika selesai tervalidasi, data akan disimpan
        Post::create($data);

        // Jika berhasil disimpan akan dialihkan ke halaman post
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Mengambil seluruh data yang ada dalam form
        $data = $request->all();

        // Merubah isi data yang isinya memuat yang login saja
        $data['user_id'] = Auth::user()->id;

        // Jika sudah diambil datanya akan disimpan
        $post->update($data);

        // Jika berhasil menyimpan akan dialihkan ke halaman post
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // Menghapus data yang ada dalam tabel post
        $post->delete();

        // Jika berhasil menghapus akan dialihkan ke dalam halaman post
        return redirect('post');
    }

    public function sembunyi(Post $post)
    {
        // Jika Tampil Post bernilai 1
        if($post->tampilPost == 1){

            // maka tampilpost akan berubah nilai menjadi 0
            $post->update([
                'tampilPost' => 0
            ]);
        } else {
            $post->update([
                'tampilPost' => 1
            ]);
        }
        
        // Jika sslah satu terpenuhi maka akan dialihkan ke halaman post
        return redirect('post');
    }
}
