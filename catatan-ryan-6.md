# Catatan Ryan

## Database | Migration | Eloquent

#### Database

**💻 Setup Database**

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wpu_blog
DB_USERNAME=root
DB_PASSWORD=

---

##### Migration

Migration seperti version control untuk database kita. Version control tujuan nya untuk melacak perubahan yang ada di dalam codingan kita.
Sehingga, migration berguna untuk melacak perubahan di dalam database kita lewat codingan Laravel.
Lalu memungkinkan kita dan team mendefinisikan serta membagikan schema / struktur dari database kita.

jadi, struktur tidak buat di dalam DBMS, melainkan di dalam codingan lewat class yang ada di dalam laravel.

caranya gunakan php artisan

misal, membuat table : `php artisan make:migration namaTabel`

cara menjalankan migration : `php artisan migrate`

jadi, semua migrasinya akan di eksekusi menjadi sebuah tabel.

ketika kita sudah melakukan migrate, maka akan muncul beberapa tabel di dalam database kita, yang sebelumnya sudah kita lakukan konfigurasi di file .env

tabel **migrations** adalah tabel yang berfungsi layaknya .git, yaitu untuk melacak perubahan terhadap database kita.

Pada file yang ada di dalam folder migrations, memiliki 2 method yaitu up() and down()

-   up() adalah sebuah method yang kita gunakan ketika kita mau membuat schema (struktur dari tabel)
-   down() adalah sebuah method yang kita gunakan untuk menghilangkan schema yang sudah kita buat.

ketika kita melakukan perintah : `php artisan migrate:rollback` maka yang terjadi adalah akan di jalankan method down()

laravel juga punya perintah untuk melakukan keduanya yaitu `php artisan migrate:fresh` , untuk melakukan rollback dan migrate sekaligus.

**fresh** digunakan ketika kita ingin melakukan perubahan terhadap schema nya.

Adapun hal yang diperhatikan di dalam schemanya adalah ketika kita membuat tabel. Silahkan cari **Column Types** di dokumentasi laravel

---

#### Eloquent ORM

ORM adalah _Object Relational Mapper_. Sebuah fungsi untuk memetakan tiap tiap data yang ada di dalam tabel atau database ke dalam sebuah object. Saat kita melakukan Eloquent, setiap tabel di dalam database kita, terhubung ke dalam sebuah "Model" yang bisa kita gunakan untuk berinteraksi dengan tabel tadi.
Selain kita bisa mengambil data-data dari tabel di database kita, Eloquent model ini juga dapat memungkinkan kita untuk melakukan CRUD ke dalam tabel lewat codingan. Jadi, kita tidak perlu menyentuh database client.

hal ini bisa terjadi karena **active record pattern**, yaitu sebuah pendekatan untuk mengakses data di dalam database.
Jadi, **tabel yg ada di dalam database** kita, itu dibungkus menjadi sebuah **class**. Sehingga, setiap data itu terhubung ke dalam instance dari class/object nya.

Jadi, satu data adalah satu object yang merepresentasikan setiap record / data di dalam tabel.

_tinker_ adalah sebuah aplikasi di dalam laravel yang dapat kita gunakan untuk berinteraksi dgn aplikasi laravel kita.

caranya gunakan perintah `php artisan tinker`

adapun perintah yang bisa kita gunakan di dalam tinker adalah

-   $user = new App\Models\User;
-   $user->name = 'Ryan Pranata';
-   $user->email = 'pranataryan91@gmail.com'
-   $user->password = bcrypt('123');
-   $user->save() => fungsi untuk simpan data ke dalam tabel
-   $user->all() => fungsi untuk menampilkan semua data
-   $user->findOrFail(2) => fungsi untuk mencari berdasarkan id
-   $user->findOrFail(233333) => mencari id, dan jika id tidak ada, maka menampilkan error
