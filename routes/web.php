<?php

use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view(
        'home',
        [
            "title" => "Home",
            "active" => "home",
        ]
    );
});

Route::get('/about', function () {
    return view(
        'about',
        [
            "title" => "About",
            "active" => "about",
            "nama" => "Muhammad Ryan Pranata",
            "email" => "pranataryan91@gmail.com",
            "image" => "download.jpg"
        ]
    );
});



Route::get('/posts', [PostController::class, 'index']);

// Slug : penanda untuk setiap elemen yang dipilih, biasanya pengganti untuk title

// Halaman Single Post
// tanda {} disebut wildcard, untuk mengambil apapun isi dari / (slash) nya
// $slug, adalah judul-post-
// Route::get('posts/{slug}', [PostController::class, 'show']);

// slug yg akan di-query untuk mendapatkan post yang unique
// sehingga where nya itu, tidak hanya bisa dgn id, melainkan menggunakan slug
Route::get('posts/{post:slug}', [PostController::class, 'show']);


// Route untuk handel Halaman Categories
Route::get('/categories', function () {
    return view(
        'categories',
        [
            'title' => 'Post Categories',
            "active" => "categories",
            'categories' => Category::all() // ambil semua data category yg ada di model Category
        ]
    );
});


Route::get('/login', [LoginController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);
