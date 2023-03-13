<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
            'categories' => Category::all() // ambil semua data category yg ada di model Category
        ]
    );
});

// Route untuk handle Category berdasarkan slug
Route::get('/categories/{category:slug}', function (Category $category) {
    return view(
        'category',
        [
            'title' => $category->name,
            'posts' => $category->posts,
            'category' => $category->name
        ]
    );
});


Route::get('/authors/{author:username}', function (User $author) {
    return view(
        'posts',
        [
            'title' => 'User Posts',
            'posts' => $author->posts
        ]
    );
});
