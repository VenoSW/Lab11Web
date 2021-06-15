# Praktikum 11 - Codeigniter - Pemrograman Web
```
Veno Setyoaji Wiratama
311910363
TI.19.A.2
Universitas Pelita Bangsa
```

## Persiapan
Beberapa ekstensi PHP perlu diaktifkan untuk kebutuhan pengembangan Codeigniter 4. Berikut beberapa ekstensi yang perlu diaktifkan:
* php-json ekstension untuk bekerja dengan JSON;
* php-mysqlnd native driver untuk MySQL;
* php-xml ekstension untuk bekerja dengan XML;
* php-intl ekstensi untuk membuat aplikasi multibahasa;
* libcurl (opsional), jika ingin pakai Curl.

Untuk mengaktifkan ekstentsi tersebut melalui `XAMPP Control Panel`, pada bagian `Apache` klik `Config` -> `PHP.ini`
![LANGKAH 1](https://user-images.githubusercontent.com/22215113/121983497-9d813080-cdbb-11eb-92f1-e932329732d2.png)
![LANGKAH 2](https://user-images.githubusercontent.com/22215113/121983535-aa9e1f80-cdbb-11eb-81c8-2c2169dbd444.png)

Kemudian buat folder baru dengan nama `lab11_php_ci` pada doc root webserver `(htdocs)`
![LANGKAH 3](https://user-images.githubusercontent.com/22215113/121983770-11233d80-cdbc-11eb-97b5-48e0663a8f18.png)

## Installasi CODEIGNITER
Ada dua cara installasi Codeigniter, yaitu cara `manual` dan menggunakan `composer`. Pada praktik kali ini menggunakan cara `manual`:
* Unduh Codeigniter dari website https://codeigniter.com/download
* Extrak file zip Codeigniter ke direktori htdocs/lab11_php_ci.
* Ubah nama direktory framework-4.x.xx menjadi ci4.
* Buka browser dengan alamat http://localhost/lab11_php_ci/ci4/public/
![LANGKAH 5](https://user-images.githubusercontent.com/22215113/121984000-6bbc9980-cdbc-11eb-9272-424122175f4f.png)

## Menjalankan CLI (Command Line Interface)
Arahkan lokasi direktori sesuai dengan direktori kerja project yang sudah dibuat (xampp/htdocs/lab11_php_ci/ci4/)
![5](https://user-images.githubusercontent.com/22215113/121984198-c2c26e80-cdbc-11eb-98b4-fb00752ea1c1.png)
Perintah yang dapat dijalankan untuk memanggil CLI Codeigniter adalah `php spark`
![6](https://user-images.githubusercontent.com/22215113/121984234-d2da4e00-cdbc-11eb-8748-a4318b9eab7a.png)

## Mengaktifkan Mode Debugging pada Codeigniter
Fitur debugging digunakan untuk memudahkan developer untuk mengetahui pesan error apabila terjadi kesalahan dalam membuat kode program.
Semua jenis error akan ditampilkan sama. Untuk memudahkan mengetahui jenis errornya, maka perlu diaktifkan mode debugging dengan mengubah nilai konfigurasi pada environment variable `CI_ENVIRINMENT` menjadi `development`.
![7](https://user-images.githubusercontent.com/22215113/121984399-192fad00-cdbd-11eb-9cf3-ab5d4975b965.png)
![8](https://user-images.githubusercontent.com/22215113/121984423-1fbe2480-cdbd-11eb-99c4-c54e4e186d0e.png)

## Struktur Direktori pada Codeigniter
Terdapat beberapa direktori dan file yang perlu dipahami fungsi dan kegunaannya.
* .github folder ini kita butuhkan untuk konfigurasi repo github, seperti konfigurasi
untuk build dengan github action;
* app folder ini akan berisi kode dari aplikasi yang kita kembangkan;
* public folder ini berisi file yang bisa diakses oleh publik, seperti file index.php, robots.txt, favicon.ico, ads.txt, dll;
* tests folder ini berisi kode untuk melakukan testing dengna PHPunit;
* vendor folder ini berisi library yang dibutuhkan oleh aplikasi, isinya juga termasuk
kode core dari system CI.
* writable folder ini berisi file yang ditulis oleh aplikasi. Nantinya, kita bisa pakai untuk menyimpan file yang di-upload, logs, session, dll.

Sedangkan file-file yang berada pada root direktori CI sebagai berikut.
* .env adalah file yang berisi variabel environment yang dibutuhkan oleh aplikasi.
* .gitignore adalah file yang berisi daftar nama file dan folder yang akan diabaikan oleh Git.
* build adalah script untuk mengubah versi codeigniter yang digunakan. Ada versi release (stabil) dan development (labil).
* composer.json adalah file JSON yang berisi informasi tentang proyek dan daftar library yang dibutuhkannya. File ini digunakan oleh Composer sebagai acuan.
* composer.lock adalah file yang berisi informasi versi dari libraray yang digunakan aplikasi.
* license.txt adalah file yang berisi penjelasan tentang lisensi Codeigniter;
* phpunit.xml.dist adalah file XML yang berisi konfigurasi untuk PHPunit.
* README.md adalah file keterangan tentang codebase CI. Ini biasanya akan dibutuhkan pada repo github atau gitlab.
* spark adalah program atau script yang berfungsi untuk menjalankan server, generate kode, dll.

## Konsep MVC
Codeigniter menggunakan konsep pemrograman berorientasi objek dalam mengimplementasikan konsep MVC.
* `Model` merupakan kode program yang berisi pemodelan data. Data dapat berupa database ataupun sumber lainnya.
* `View` merupakan kode program yang berisi bagian yang menangani terkait tampilan user interface sebuah aplikasi. didalam aplikasi web biasanya pasti akan berhubungan dengan `html` dan `css`.
* `Controller` merupakaan kode program yang berkaitan dengan logic proses yang menghubungkan antara view dan model. Controller berfungsi untuk menerima request dan data dari user kemudian diproses dengan menghubungkan bagian model dan view.
* `Routing dan Controller`
`Routing` merupakan proses yang mengatur arah atau rute dari request untuk menentukan fungsi/bagian mana yang akan memproses request tersebut. Pada framework CI4, routing bertujuan untuk menentukan Controller mana yang harus merespon sebuah request. `Controller` adalah class atau script yang bertanggung jawab merespon sebuah request.
Pada Codeigniter, request yang diterima oleh file index.php akan diarahkan ke Router untuk meudian oleh router tesebut diarahkan ke Controller.
Router terletak pada file `app/config/Routes.php`

## Membuat Route Baru
Tambahkan kode berikut di dalam `app/config/Routes.php`
```
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');

```
![10](https://user-images.githubusercontent.com/22215113/121985307-b8a16f80-cdbe-11eb-9fd5-ecb4287d29b7.png)
Untuk mengetahui route yang ditambahkan sudah benar, buka CLI dan jalankan perintah berikut.
```
php spark routes
```
Ketik perintah berikut untuk menjalankan server CI 4 pada port 8080.
```
php spark serve
```
![11](https://user-images.githubusercontent.com/22215113/121985329-c35c0480-cdbe-11eb-9206-5c81a8a69a0b.png)
Selanjutnya coba akses route yang telah dibuat dengan mengakses alamat url `http://localhost:8080/about`
Ketika diakses akan mucul tampilan error 404 file not found, itu artinya file/page tersebut tidak ada. Untuk dapat mengakses halaman tersebut, harus dibuat terlebih dahulu Contoller yang sesuai dengan routing yang dibuat yaitu Contoller Page.

## Membuat Controller
Buat file baru dengan nama `page.php` pada `direktori Controller` kemudian isi kodenya seperti berikut.
```
<?php

namespace App\Controllers;

class Page extends BaseController
{
  public function about()
  {
    echo "Ini halaman About";
  }
  public function contact()
  {
    echo "Ini halaman Contact";
  }
  public function faqs()
  {
    echo "Ini halaman FAQ";
  }
}
```
Selanjutnya refresh Kembali browser, maka akan ditampilkan hasilnya yaotu halaman sudah dapat diakses.

## Auto Route
Secara default fitur autoroute pada Codeiginiter sudah aktif. Untuk mengubah status autoroute dapat mengubah nilai variabelnya. Untuk menonaktifkan ubah nilai `true` menjadi `false`.
```
$routes->setAutoRoute(true);
```
Tambahkan method baru pada Controller Page seperti berikut.
```
public function tos()
{
   echo "ini halaman Term of Services";
}
```
![13](https://user-images.githubusercontent.com/22215113/121985908-d6230900-cdbf-11eb-83bb-c55a9dd12931.png)
![12](https://user-images.githubusercontent.com/22215113/121985638-52691c80-cdbf-11eb-8041-ad57f6248d8b.png)

## Membuat View
Buat file baru dengan nama `about.php` pada direktori view `(app/view/about.php)` kemudian coding seperti berikut.
```
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title; ?></title>
</head>
<body>
  <h1><?= $title; ?></h1>
  <hr>
  <p><?= $content; ?></p>
</body>
</html>

```
Ubah method about pada class Controller Page menjadi seperti berikut:
```
public function about()
{
  return view('about', ['title' => 'Halaman Abot','content' => 'Ini adalah halaman abaut yang menjelaskan tentang isi halaman ini.']);
}
```
![14](https://user-images.githubusercontent.com/22215113/121985942-e3d88e80-cdbf-11eb-8fa0-6aa6e489b3be.png)
![15](https://user-images.githubusercontent.com/22215113/121985862-c0154880-cdbf-11eb-925c-40f8079fcfaa.png)

## Membuat Layout Web dengan CSS
Pada dasarnya layout web dengan css dapat diimplamentasikan dengan mudah pada Codeigniter. Yang perlu diketahui adalah, pada Codeigniter 4 file yang menyimpan asset `css` dan `javascript` terletak pada direktori `public`.
Buat file css pada direktori public dengan nama `style.css`
![19](https://user-images.githubusercontent.com/22215113/121986220-55184180-cdc0-11eb-9392-4b6d30321bbf.png)
Kemudian buat folder template pada direktori view kemudian buat file `header.php` dan `footer.php`
![20](https://user-images.githubusercontent.com/22215113/121986369-94469280-cdc0-11eb-92be-a87c4ab67bc3.png)
File `app/view/template/header.php`
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css');?>">
</head>
<body>
    <div id="container">
    <header>
        <h1>Layout Sederhana</h1>
    </header>
    <nav>
        <a href="<?= base_url('/');?>" class="active">Home</a>
        <a href="<?= base_url('/artikel');?>">Artikel</a>
        <a href="<?= base_url('/about');?>">About</a>
        <a href="<?= base_url('/contact');?>">Kontak</a>
    </nav>
    <section id="wrapper">
        <section id="main">
```
File `app/view/template/footer.php`
```
        </section>
            <aside id="sidebar">
                <div class="widget-box">
                    <h3 class="title">Widget Header</h3>
                    <ul>
                        <li><a href="#">Widget Link</a></li>
                        <li><a href="#">Widget Link</a></li>
                    </ul>
                </div>
                <div class="widget-box">
                    <h3 class="title">Widget Text</h3>
                    <p>Vestibulum lorem elit, iaculis in nisl volutpat, malesuada
                    tincidunt arcu. Proin in leo fringilla, vestibulum mi porta, faucibus felis.
                    Integer pharetra est nunc, nec pretium nunc pretium ac.</p>
                </div>
            </aside>
        </section>
    <footer>
        <p>&copy; 2021 - Universitas Pelita Bangsa</p>
    </footer>
    </div>
</body>
</html>
```
Kemudian ubah file `app/view/about.php` seperti berikut.
```
<?= $this->include('template/header'); ?>
   <h1><?= $title; ?></h1>
   <hr>
   <p><?= $content; ?></p>
<?= $this->include('template/footer'); ?>
```
![21](https://user-images.githubusercontent.com/22215113/121986821-6f9eea80-cdc1-11eb-94c0-3eb6caa966ed.png)

## Tugas
Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga semua link pada navigasi header dapat menampilkan tampilan dengan layout yang sama.
* Update Controller `(page.php)`
```
<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function artikel()
    {
        return view('artikel', [
            'title' => 'Halaman Artikel']);
    }
    public function about()
    {
        return view('about', [
            'title' => 'Halaman About']);
    }
    public function contact()
    {
        return view('contact', [
            'title' => 'Halaman Contact']);
    }
    public function faqs()
    {
        echo "Ini halaman FAQ";
    }
    public function tos()
    {
        echo "ini halaman Term of Services";
    }
}
```

* Menu About
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
</head>
<body>
    <?= $this->include('template/header'); ?>
    <section id="about">
        <div class="row">
            <img src="venosw.JPG" title="Veno Setyoaji Wiratama" alt="Veno Setyoaji Wiratama" class="image-circle" width="200" style="float: left; border: 2px solid black;">
            <h1>Veno Setyoaji Wiratama</h1>
            <p>Nama saya Veno Setoaji Wiratama, Saya adalah seorang mahasiswa Universitas Pelita Bangsa Jurusan Teknik Informatika. Saya lahir di Pemalang, 8 April 2001.
            </p>
        </div>
    </section>
    <?= $this->include('template/footer'); ?>
</body>
</html>
```
![tugas 1](https://user-images.githubusercontent.com/22215113/121987043-db815300-cdc1-11eb-8bcd-761cfd5e67d3.png)

* Menu Artikel
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
</head>
<body>
    <?= $this->include('template/header'); ?>
    <h1><?= $title; ?></h1>
    <hr class="divider" />
        <article class="entry">
            <h2>First featurette heading.</h2>
            <img src="https://dummyimage.com/150/7b8a70/fff.png" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum lorem
            elit, iaculis in nisl volutpat, malesuada tincidunt arcu. Proin in leo fringilla,
            vestibulum mi porta, faucibus felis. Integer pharetra est nunc, nec pretium nunc
            pretium ac.</p>
        </article>
        <hr class="divider" />
        <article class="entry">
            <h2>First featurette heading.</h2>
            <img src="https://dummyimage.com/150/7b8a70/fff.png" alt="" class="right-img">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum lorem
            elit, iaculis in nisl volutpat, malesuada tincidunt arcu. Proin in leo fringilla,
            vestibulum mi porta, faucibus felis. Integer pharetra est nunc, nec pretium nunc
            pretium ac.</p>
    </article>
    <?= $this->include('template/footer'); ?>
</body>
</html>
```
![tugas 2](https://user-images.githubusercontent.com/22215113/121987052-e20fca80-cdc1-11eb-969a-1055bd74e3c2.png)

* Menu Contact
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
</head>
<body>
    <?= $this->include('template/header'); ?>
    <section id="kontak">
            <div class="login">
                <input type="text" placeholder="Your Name" class="input">
                <input type="text" placeholder="Your Email Address" class="input">
            </div>

            <div class="subject">
                <input type="text" placeholder="Subject" class="input">
            </div>

            <div class="msg">
                <textarea class="area" cols="35" rows="10" placeholder="Your Message" class="input"></textarea>
            </div>

            <button type="submit"> Send </button>
        </section>
    <?= $this->include('template/footer'); ?>
</body>
</html>
```
![tugas 3](https://user-images.githubusercontent.com/22215113/121987063-e76d1500-cdc1-11eb-8878-5ca02b5761a0.png)
