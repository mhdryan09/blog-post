<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
            "title" => "Home"
        ]
    );
});

Route::get('/about', function () {
    return view(
        'about',
        [
            "title" => "About",
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
Route::get('posts/{slug}', [PostController::class, 'show']);
