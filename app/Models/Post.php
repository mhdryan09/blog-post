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

    // properti untuk pemanggilan query dari category dan author
    protected $with = ['category', 'author'];

    // method untuk filtering
    // akan menerima parameter query
    public function scopeFilter($query, array $filters)
    {
        // jika ada pencarian data

        // jika ada variabel search, menggunakan method isset
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     // tambahkan kondisi berdasarkan judul dan body
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        // teknik Null coalescing operator (??)
        // jika true, lakukan callback function -> ambil query lalu jika ada isinya, maka ambil search nya juga
        // use digunakan untuk merujuk pada paramater dari callback function tersebut
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                // tambahkan kondisi berdasarkan judul dan body
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        // filtering category
        // versi callback function
        $query->when($filters['category'] ?? false, function ($query, $category) {
            // lakukan join tabel dgn tabel category dgn whereHas
            return $query->whereHas('category', function ($query) use ($category) {
                // tambahkan kondisi berdasarkan category 
                $query->where('slug', $category);
            });
        });

        // filtering author
        // versi arrow function
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )
        );
    }

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
