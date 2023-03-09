<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_posts = [
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

    // method untuk mengambil semua data
    public static function all()
    {
        // self:: digunakan karena $blog_posts menggunakan properti static
        // kita ubah menjadi collection
        return collect(self::$blog_posts);
    }

    // method untuk mengambil data berdasarkan slug/title yg dipilih
    public static function find($slug)
    {
        // $posts = self::$blog_posts; // ambil semua blog post

        $posts = static::all(); // ambil data dari method all yg berupa collection

        // kita cek apakah sama slug dari blog post dengan slug yg dipilih
        // $post = [];
        // foreach ($posts as $p) {
        //     // jika slug dari post nya sama dengan yg dikirimkan
        //     if ($p["slug"] === $slug) {
        //         // masukan ke array baru
        //         $post = $p;
        //     }
        // }

        return $posts->firstWhere('slug', $slug);
        // ambil semua post, lalu cari yg pertama ditemukan dimana slug yg di post itu sama dengan slug yang dipilih
    }
}

// collection adalah sebuah pembungkus sebuah array yang akan membuat array menjadi lebih sakti.
// method yang digunakan adalah collect()
// dia akan mengubah array menjadi collection.

// first, untuk mencari elemen yang pertama
// firstWhere, untuk mencari elemen yang pertama kali ketemu dengan sebuah kondisi

// self::       => khusus untuk mengambil properti static
// static::     => khusus untuk mengambil method static