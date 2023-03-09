<?php

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



Route::get('/blog', function () {

    $blog_post = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Muhammad Ryan Pranata",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi quis ea dolorum delectus incidunt, veniam minus? Ullam, eius! Sunt quod voluptatum optio, reiciendis minus quaerat dignissimos id sed a? Est ducimus unde, molestiae asperiores magni at inventore voluptas debitis, animi quibusdam dolorem aut quos ad sapiente porro numquam velit voluptatibus libero id expedita omnis veritatis laudantium? Corporis, consequatur. Obcaecati sit tempore in earum et? Consequuntur beatae eaque labore pariatur sequi saepe molestiae deleniti hic nemo nobis eligendi, reiciendis sed magni."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Yudhia Ayu Puspita",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. At, fugiat dicta! Optio eveniet sed maiores blanditiis quam deleniti sint tempora numquam soluta repellat aut delectus assumenda pariatur necessitatibus ducimus ad laboriosam officiis recusandae dignissimos harum repellendus magni, quasi quaerat voluptatem? Deleniti vitae reprehenderit aliquid magnam ipsam totam, id autem culpa expedita animi, iusto optio nihil? Eaque quo et rem eligendi corporis repellendus fuga eveniet assumenda, labore nam. Tempore, saepe, minus voluptatum dolores illo magnam totam enim neque dolorum, harum laboriosam at earum veniam tenetur eos rem libero quasi unde commodi sequi vitae? Facilis necessitatibus possimus, consectetur numquam eum deserunt repellat."
        ]
    ];

    return view(
        'posts',
        [
            "title" => "Blog",
            "posts" => $blog_post
        ]
    );
});

// Slug : penanda untuk setiap elemen yang dipilih, biasanya pengganti untuk title

// Halaman Single Post
// tanda {} disebut wildcard, untuk mengambil apapun isi dari / (slash) nya
// $slug, adalah judul-post-
Route::get('posts/{slug}', function ($slug) {

    $blog_post = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Muhammad Ryan Pranata",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi quis ea dolorum delectus incidunt, veniam minus? Ullam, eius! Sunt quod voluptatum optio, reiciendis minus quaerat dignissimos id sed a? Est ducimus unde, molestiae asperiores magni at inventore voluptas debitis, animi quibusdam dolorem aut quos ad sapiente porro numquam velit voluptatibus libero id expedita omnis veritatis laudantium? Corporis, consequatur. Obcaecati sit tempore in earum et? Consequuntur beatae eaque labore pariatur sequi saepe molestiae deleniti hic nemo nobis eligendi, reiciendis sed magni."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Yudhia Ayu Puspita",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. At, fugiat dicta! Optio eveniet sed maiores blanditiis quam deleniti sint tempora numquam soluta repellat aut delectus assumenda pariatur necessitatibus ducimus ad laboriosam officiis recusandae dignissimos harum repellendus magni, quasi quaerat voluptatem? Deleniti vitae reprehenderit aliquid magnam ipsam totam, id autem culpa expedita animi, iusto optio nihil? Eaque quo et rem eligendi corporis repellendus fuga eveniet assumenda, labore nam. Tempore, saepe, minus voluptatum dolores illo magnam totam enim neque dolorum, harum laboriosam at earum veniam tenetur eos rem libero quasi unde commodi sequi vitae? Facilis necessitatibus possimus, consectetur numquam eum deserunt repellat."
        ]
    ];

    // kita cek apakah sama slug dari blog post dengan slug yg dipilih

    $new_post = [];

    foreach ($blog_post as $post) {
        // jika slug dari post nya sama dengan yg dikirimkan
        if ($post["slug"] === $slug) {
            // masukan ke array baru
            $new_post = $post;
        }
    }

    return view(
        'post',
        [
            "title" => "Single Post",
            "post" => $new_post
        ]
    );
});
