<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            // ambil data postingan yang user id nya sama dengan user yang sedang login
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts', // unique dari tabel post
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        // pengecekan upload gambar

        // jika gambar ada isinya (di-upload)
        if ($request->file('image')) {
            // ambil file image lalu arahkan ke folder mana yang mau disimpan
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        // tambahkan data user id
        $validatedData['user_id'] = auth()->user()->id;

        // tambahkan data excerpt yg diambil dari body
        // strip_tags, untuk menghapus tag html di dalam inputan body
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        // insert data ke tabel Post
        Post::create($validatedData);

        // arahhkan ke halaman dahsboard dan alert
        return redirect('/dashboard/posts')->with('success', 'New post has beed added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // kita buat aturan nya
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];

        // kalau slug yang baru (dari inputan) itu tidak sama dengan slug yang lama (yang ada di tabel)

        // jika slug nya berbeda
        if ($request->slug != $post->slug) {
            // tambahkan validasi slug nya
            $rules['slug'] = 'required|unique:posts';
        }

        // validasi data
        $validatedData = $request->validate($rules);

        // tambahkan data user id
        $validatedData['user_id'] = auth()->user()->id;

        // tambahkan data excerpt yg diambil dari body
        // strip_tags, untuk menghapus tag html di dalam inputan body
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        // update data ke tabel Post
        Post::where('id', $post->id)
            ->update($validatedData);

        // arahhkan ke halaman dahsboard dan alert
        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // delete data dari tabel Post berdasarkan id
        Post::destroy($post->id);

        // arahhkan ke halaman dahsboard dan alert
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        // membuat slug dari model Post, dari kolom slug yang menerima data title
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        // kirim berupa json dgn key slug
        return response()->json(['slug' => $slug]);
    }
}
