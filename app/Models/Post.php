<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // kolom yang boleh diisi, sisanya akan diisi otomatis
    // protected $fillable = ['title', 'excerpt', 'body'];

    // kolom yg ga boleh diisi (dijagain)
    protected $guarded = ['id'];
}

// fillable dan guarded akan kepakai kalau kita ingin melakukan mass assignment yang lain, selain dari create. misal, update.

// Post::crete([])  => proses create data
// Post::find(3)->update(['title' => 'Judul Ketiga Berubah'])   => proses update data

// kalau kita tidak ingin berdasarkan id, maka kita bisa gunakan perintah where, sehingga kita bisa melakukan kondisi selain id nya.
// contoh : cari title tertentu, lalu ubah excerpt nya

// Post::where('title', 'Judul Ketiga Berubah')->update(['excerpt' => 'excerpt post 3 berubah'])