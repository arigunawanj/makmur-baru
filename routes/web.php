<?php

use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JamuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();

Route::middleware(['auth'])->group(function () {
    
    // Route Kategori
    Route::resource('category', CategoryController::class);
    Route::get('category/{category}', [CategoryController::class, 'destroy']);
    
    // Route Produk
    Route::resource('product', ProductController::class);
    Route::get('product/{product}', [ProductController::class, 'destroy']);
    
    // Route Sembunyikan Produk
    Route::get('sembunyiproduk/{product}', [ProductController::class, 'sembunyi']);
    
    // Route Post
    Route::resource('post', PostController::class);
    Route::get('post/{post}', [PostController::class, 'destroy']);
    
    // Route Sembunyikan Post
    Route::get('sembunyipost/{post}', [PostController::class, 'sembunyi']);
    
});

Route::middleware(['auth', 'Admin'])->group(function () {
    // Route user
    Route::get('user', [UserController::class, 'utama']);
    Route::put('user/{user}', [UserController::class, 'perbarui']);
    
});
// Route Jamu
Route::get('jamu', [JamuController::class, 'HalUtama']);
Route::post('simpanjamu', [JamuController::class, 'SimpanJamu']);

// Route Beranda
Route::get('/', [BerandaController::class, 'beranda']);
Route::get('detail/{post}', [BerandaController::class, 'detail']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
