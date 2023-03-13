## Factory

Pada saat pengujian, kita membutuhkan data baru ke dalam database sebelum kita menjalankan tes. Daripada kita secara manual mengetikan setiap kolomnya. Laravel memungkinkan kita untuk mendefinisikan sebuah **factory** ke dalam model.

Di dalam factory, kita menggunakan library **faker** yang sudah di tanam di dalam laravel. Jadi, faker tersebut akan melakukan generate random sesuai dengan data yang kita sudah tentukan.

perintah : `php artisan make:factory PostFactory`

Kita bisa kunjungi link dokumentasi [Faker](https://fakerphp.github.io)

Sebelumnya, kita bisa menggunakan data faker yang berasal dari local(negara) yang kita inginkan. Misal, indonesia. Caranya, kita buka file [app/config/app.php] lalu ubah menjadi seperti ini :

`'faker_locale' => env('FAKER_LOCALE', 'en_US'),`

lalu masukan ke file .env dan tambahkan perintah ini di paling bawah:

`FAKER_LOCALE=id_ID`

selanjutnya, kita bisa buka DatabaseSeeder dan jalankan perintah `User::factory(5)->create();` lalu cek ke database.

Cara membuat Factory

1.  Masuk Terminal, dan berikan perintah `php artisan make:factory PostFactory`

2.  Setelah factory dibuat, masuk ke file [app/database/factories/PostFactory.php]
    kita bisa tambahkan perintah ini pada method definition :

           'title' => $this->faker->sentence(mt_rand(2, 8)),
           'slug' => $this->faker->slug(),
           'excerpt' => $this->faker->paragraph(),
           'body' => $this->faker->paragraph(mt_rand(5, 10)),
           'user_id' => mt_rand(1,3),
           'category_id' => mt_rand(1,2)

3.  lalu pada file DatabaseSeeder, kita jalankan factory post nya `Post::factory(20)->create();`
