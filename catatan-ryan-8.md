## Catatan Ryan

## Membuat Category

`Post::where('category_id', 1)->get()` : kita mengambil semua data yang memiliki category_id nya adalah 1

Jika kita ingin tahun category_name tanpa harus tahu category_id nya, kita bisa melakukan relasi tabel. Pada laravel ini disebut **Eloquent Relationship**

Tabel di dalam database biasanya berelasi satu sama lain. Contohnya, ketika kita membuat sistem Blog, sebuah blog post mungkin aja memiliki banyak komentar. Komentar tersebut, selain berelasi dengan tabel blog, pasti berelasi dengan siapa yang menulisnya atau kemungkinan berelasi dgn tabel user.

Beberapa hal yang paling banyak digunakan mengenai relasi :

-   One To One
-   One To Many
-   Many To Many

## Table Relationship

Apabila kita ingin menghubungkan 2 tabel, maka kita harus menambahkan _foreign-key_

Cara baca : mulai dari tabel yang menitipkan kunci ke tabel utama, sehingga dibaca: tabel categories yang berelasi dengan tabel posts

![Relasi Tabel](../coba-laravel/public/img/relasi-tabel/1.png "Foreign Key")

Setelah itu kita harus tentukan Cardinalitas nya

-   One to One
-   One to Many
-   Many to Many

**1 kategori bisa memiliki banyak post**
misal kategori web. maka ada beberapa postingan yang memiliki kategori tentang web

![Relasi Tabel](../coba-laravel/public/img/relasi-tabel/2.png "Cardinality One to Many")

Cardinalitas juga punya kebalikan, yang berarti kita melihat dari sisi tabel posts.

**1 post dimiliki oleh 1 kategori**

![Relasi Tabel](../coba-laravel/public/img/relasi-tabel/3.png "Cardinality Inverse")

Sehingga di dapat kan relasi seperti ini :

![Relasi Tabel](../coba-laravel/public/img/relasi-tabel/4.png "Relationship 1")

Contoh 2 :

![Relasi Tabel](../coba-laravel/public/img/relasi-tabel/5.png "Relationship 2a")

Dibaca :

-   1 Post hanya dimiliki oleh 1 user dan
-   1 user bisa memiliki banyak post

Sehingga di dapat kan relasi seperti ini :

![Relasi Tabel](../coba-laravel/public/img/relasi-tabel/6.png "Relationship 2b")

Contoh 3 :

![Relasi Tabel](../coba-laravel/public/img/relasi-tabel/7.png "Relationship 3")

Dibaca :

-   1 Post punya banyak Comment
-   1 Comment itu pasti hanya ada 1 di postingan
-   1 Comment pasti dimiliki 1 user
-   1 User punya banyak comment
