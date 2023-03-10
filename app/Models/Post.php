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

    // cara untuk melakukan relasi tabel :

    // method untuk relasi tabel dgn category
    public function category()
    {
        // mengembalikan relasi dari post terhadap model Category

        // belongsTo artinya 1 postingan punya 1 Category
        return $this->belongsTo(Category::class);
    }
}
