<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    // method default
    public function index()
    {
        $title = '';

        // kalau ada category
        if (request('category')) {
            // cari category berdasarkan slug
            $category = Category::firstWhere('slug', request('category'));
            // timpa title nya
            $title = ' in ' . $category->name;
        }

        // kalau ada author
        if (request('author')) {
            // cari author berdasarkan username
            $author = User::firstWhere('username', request('author'));
            // timpa title nya
            $title = ' by ' . $author->name;
        }


        return view(
            'posts',
            [
                "title" => "All Post" . $title,
                "active" => "posts",
                "posts" => Post::latest()->filter(request(['search', 'category', 'author']))
                    ->paginate(7)->withQueryString()
                // tambahkan filter berdasarkan request sebelum ambil data
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
                "active" => "posts",
                // "post" => Post::find($slug) // kita cari postingan berdasarkan slug nya

                "post" => $post // ga perlu query, karena sudah otomatis dicarikan id sama laravel
            ]
        );
    }
}
