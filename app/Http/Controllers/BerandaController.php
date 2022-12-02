<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda()
    {
        $post = Post::where('tampilPost', 1)->get();
        return view('beranda', compact('post'));
    }

    public function detail(Post $post)
    {
        $product = Product::where('category_id', $post->category_id)->where('tampilProduk', 1)->get();

        return view('detailberanda', compact('post','product'));
    }
}
