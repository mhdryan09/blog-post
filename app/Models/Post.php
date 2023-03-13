<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // kolom yang boleh diisi, sisanya akan diisi otomatis
    // protected $fillable = ['title', 'excerpt', 'body'];

    // kolom yg ga boleh diisi (dijagain)
    protected $guarded = ['id'];

    // method untuk relasi tabel dgn category
    public function category()
    {
        // belongsTo artinya 1 postingan punya 1 Category
        return $this->belongsTo(Category::class);
    }

    // kita ganti user_id dengan nama lain yaitu author
    public function author()
    {
        // belongsTo artinya 1 postingan hanya dimiliki oleh 1 user
        return $this->belongsTo(User::class, 'user_id');
    }
}
