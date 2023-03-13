<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // set manual insert data
        User::create([
            "name" => "Muhammad Ryan Pranata",
            "email" => "pranataryan91@gmail.com",
            "password" => bcrypt("12345")
        ]);

        User::create([
            "name" => "Yudhia Ayu Puspita",
            "email" => "yudhiayu11@gmail.com",
            "password" => bcrypt("12345")
        ]);

        Category::create([
            "name" => "Web Programming",
            "slug" => "web-programming"
        ]);

        Category::create([
            "name" => "Personal",
            "slug" => "personal"
        ]);

        Post::create([
            "title" => "Judul Pertama",
            "slug" => "judul-pertama",
            "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quasi aliquid itaque dolorem ducimus aliquam voluptas doloribus quos deleniti, ea ex consectetur, accusantium",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quasi aliquid itaque dolorem ducimus aliquam voluptas doloribus quos deleniti, ea ex consectetur, accusantium consequatur laborum iure molestiae nisi sit quia odit, neque ipsa officia nesciunt hic soluta! Cupiditate quas quam asperiores porro libero, in temporibus cum aspernatur cumque commodi pariatur nulla illo maxime voluptatem sed voluptate qui, dicta dolorem recusandae quidem. Aut excepturi non earum ea similique debitis laboriosam, dignissimos quisquam dolore aliquam iure ex explicabo voluptates quibusdam optio, dolorum veritatis distinctio! Dolor quaerat exercitationem explicabo ipsum, tempore voluptate eius atque, dignissimos maxime reiciendis excepturi molestiae reprehenderit unde accusamus officiis!",
            "category_id" => 1,
            "user_id" => 1
        ]);

        Post::create([
            "title" => "Judul Kedua",
            "slug" => "judul-kedua",
            "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quasi aliquid itaque dolorem ducimus aliquam voluptas doloribus quos deleniti, ea ex consectetur, accusantium",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quasi aliquid itaque dolorem ducimus aliquam voluptas doloribus quos deleniti, ea ex consectetur, accusantium consequatur laborum iure molestiae nisi sit quia odit, neque ipsa officia nesciunt hic soluta! Cupiditate quas quam asperiores porro libero, in temporibus cum aspernatur cumque commodi pariatur nulla illo maxime voluptatem sed voluptate qui, dicta dolorem recusandae quidem. Aut excepturi non earum ea similique debitis laboriosam, dignissimos quisquam dolore aliquam iure ex explicabo voluptates quibusdam optio, dolorum veritatis distinctio! Dolor quaerat exercitationem explicabo ipsum, tempore voluptate eius atque, dignissimos maxime reiciendis excepturi molestiae reprehenderit unde accusamus officiis!",
            "category_id" => 1,
            "user_id" => 1
        ]);

        Post::create([
            "title" => "Judul Ketiga",
            "slug" => "judul-ketiga",
            "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quasi aliquid itaque dolorem ducimus aliquam voluptas doloribus quos deleniti, ea ex consectetur, accusantium",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quasi aliquid itaque dolorem ducimus aliquam voluptas doloribus quos deleniti, ea ex consectetur, accusantium consequatur laborum iure molestiae nisi sit quia odit, neque ipsa officia nesciunt hic soluta! Cupiditate quas quam asperiores porro libero, in temporibus cum aspernatur cumque commodi pariatur nulla illo maxime voluptatem sed voluptate qui, dicta dolorem recusandae quidem. Aut excepturi non earum ea similique debitis laboriosam, dignissimos quisquam dolore aliquam iure ex explicabo voluptates quibusdam optio, dolorum veritatis distinctio! Dolor quaerat exercitationem explicabo ipsum, tempore voluptate eius atque, dignissimos maxime reiciendis excepturi molestiae reprehenderit unde accusamus officiis!",
            "category_id" => 2,
            "user_id" => 1
        ]);

        Post::create([
            "title" => "Judul Keempat",
            "slug" => "judul-empat",
            "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quasi aliquid itaque dolorem ducimus aliquam voluptas doloribus quos deleniti, ea ex consectetur, accusantium",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo quasi aliquid itaque dolorem ducimus aliquam voluptas doloribus quos deleniti, ea ex consectetur, accusantium consequatur laborum iure molestiae nisi sit quia odit, neque ipsa officia nesciunt hic soluta! Cupiditate quas quam asperiores porro libero, in temporibus cum aspernatur cumque commodi pariatur nulla illo maxime voluptatem sed voluptate qui, dicta dolorem recusandae quidem. Aut excepturi non earum ea similique debitis laboriosam, dignissimos quisquam dolore aliquam iure ex explicabo voluptates quibusdam optio, dolorum veritatis distinctio! Dolor quaerat exercitationem explicabo ipsum, tempore voluptate eius atque, dignissimos maxime reiciendis excepturi molestiae reprehenderit unde accusamus officiis!",
            "category_id" => 2,
            "user_id" => 2
        ]);
    }
}
