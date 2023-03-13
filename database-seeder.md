## Seeding

Seeding artinya kita bisa mengisi otomatis tabel kita ketika kita buat.
Jadi, DatabaseSeeder adalah sebuah fitur dari laravel untuk men-generate atau populasi isi dari tabel secara otomatis dengan data testing pada saat development.

perintah `php artisan make:seeder UserSeeder`

atau kita bisa menggunakan **Factories**, yang berarti kita membuat pabrik pembuat data untuk melakukan **seeding** secara otomatis.

apabila kita melakukan perubahan terhadap Database Seeder, seperti kita punya kolom yang punya unique, alias tidak bisa diisi ulang, maka kita berikan perintah ini

`php artisan migrate:fresh --seed`

yang artinya, tabel dihapus sembari mengisi ulang data nya menggunakan database seeder
