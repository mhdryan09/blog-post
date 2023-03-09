<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // method default
    public function index()
    {
        return view(
            'posts',
            [
                "title" => "Blog",
                "posts" => Post::all() //  untuk mendapatkan semua data postingan
            ]
        );
    }

    // akan menerima id yg disimpan dalam $post
    // dimana memiliki instance dari Model Class Post
    // nama paramater ($post) nya harus sama dengan nama {$post} yang dikirim dari route nya, yaitu 'posts/{post}'
    public function show(Post $post)
    {
        return view(
            'post',
            [
                "title" => "Single Post",
                // "post" => Post::find($slug) // kita cari postingan berdasarkan slug nya

                "post" => $post // ga perlu query, karena sudah otomatis dicarikan id sama laravel
            ]
        );
    }
}
