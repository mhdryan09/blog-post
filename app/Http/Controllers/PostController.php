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

    // method untuk menampilkan detail dari satu postingan
    public function show($slug)
    {
        return view(
            'post',
            [
                "title" => "Single Post",
                "post" => Post::find($slug) // kita cari postingan berdasarkan slug nya
            ]
        );
    }
}
