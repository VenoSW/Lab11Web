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

# Praktikum 12 - Lanjutan Codeigniter - Pemrograman Web
```
Veno Setyoaji Wiratama
311910363
TI.19.A.2
Universitas Pelita Bangsa
```

## Persiapan
Buat Database
```
CREATE DATABASE lab_ci4;
```
Buat Tabel
```
CREATE TABLE artikel (
 id INT(11) auto_increment,
 judul VARCHAR(200) NOT NULL,
 isi TEXT,
 gambar VARCHAR(200),
 status TINYINT(1) DEFAULT 0,
 slug VARCHAR(200),
 PRIMARY KEY(id)
);
```

![2](https://user-images.githubusercontent.com/22215113/122672578-6c0ec780-d1f6-11eb-81bc-c7d9ea18de69.png)
![3](https://user-images.githubusercontent.com/22215113/122672580-6f09b800-d1f6-11eb-8703-83a6afd7680e.png)

## Langkah 1 - Konfigurasi Koneksi Database
Konfigurasi dapat dilakukan dengan cara mengubah beberapa kode pada file `htdocs\lab11_php_ci\ci4\.env`.
* Cari pada line `DATABASE`
* Ubah seperti berikut ini
```
# database.default.hostname = localhost
# database.default.database = lab_ci4
# database.default.username = root
# database.default.password = 
# database.default.DBDriver = MySQLi
# database.default.DBPrefix =
```
* Hilangkan tanda pagar `#` didepan. Maka jadi seperti dibawah ini.
```
database.default.hostname = localhost
database.default.database = lab_ci4
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
```

![4](https://user-images.githubusercontent.com/22215113/122672629-cf005e80-d1f6-11eb-81bd-3159322bd8b1.png)

## Langkah 2 - Membuat Model
Selanjutnya adalah membuat Model untuk memproses data Artikel. Buat file baru pada direktori `app/Models` dengan nama `ArtikelModel.php`
```
<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul', 'isi', 'status', 'slug', 'gambar'];
}
```

![5](https://user-images.githubusercontent.com/22215113/122672746-649bee00-d1f7-11eb-995b-c8d101a2b0c2.png)

## Langkah 3 - Membuat Controller
Buat Controller baru dengan nama `Artikel.php` pada direktori `app/Controllers`. 
```
<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();
        return view('artikel/index', compact('artikel', 'title'));
    }
}
```

![6](https://user-images.githubusercontent.com/22215113/122672793-94e38c80-d1f7-11eb-9f2f-9c4fd1d05b03.png)

## Langkah 4 - Membuat View
Buat folder baru dengan nama `artikel` pada direktori `app/views`, kemudian buat file baru dengan nama `index.php`. 
```
<?= $this->include('template/header'); ?>

<?php if($artikel): foreach($artikel as $row): ?>
<article class="entry">
    <h2><a href="<?= base_url('/artikel/' . $row['slug']);?>"><?=$row['judul']; ?></a></h2>
    <img src="<?= base_url('/gambar/' . $row['gambar']);?>" alt="<?=$row['judul']; ?>">
    <p><?= substr($row['isi'], 0, 200); ?></p>
</article>
<hr class="divider" />
<?php endforeach; else: ?>
<article class="entry">
    <h2>Belum ada data.</h2>
</article>
<?php endif; ?>

<?= $this->include('template/footer'); ?>
```

![7](https://user-images.githubusercontent.com/22215113/122672834-c3616780-d1f7-11eb-932c-0aff0226f6c2.png)

Selanjutnya buka browser kembali, dengan mengakses url http://localhost:8080/artikel

![8](https://user-images.githubusercontent.com/22215113/122672889-fdcb0480-d1f7-11eb-8cff-2fdb21c4aed5.png)

Kemudian tambahkan beberapa data pada database agar dapat ditampilkan datanya.

![9](https://user-images.githubusercontent.com/22215113/122672910-25ba6800-d1f8-11eb-80d7-1ec2a82e08c8.png)

Refresh kembali browser, sehingga akan ditampilkan hasilnya.

![10](https://user-images.githubusercontent.com/22215113/122672916-2f43d000-d1f8-11eb-9e98-84b591701109.png)

## Langkah 5 - Membuat Tampilan Detail Artikel
Tampilan pada saat judul berita di klik maka akan diarahkan ke halaman yang berbeda. Tambahkan fungsi baru pada `Controller Artike` dengan nama `view()`.
```
public function view($slug)
    {
        $model = new ArtikelModel();
        $artikel = $model->where(['slug' => $slug])->first();
        // Menampilkan error apabila data tidak ada.
        if (!$artikel)
        {
            throw PageNotFoundException::forPageNotFound();
        }
        $title = $artikel['judul'];
        return view('artikel/detail', compact('artikel', 'title'));
    }
```

![11](https://user-images.githubusercontent.com/22215113/122672934-55697000-d1f8-11eb-827e-a010f28cf05f.png)

## Langkah 6 - Membuat View Detail
Buat view baru untuk halaman detail dengan nama `app/views/artikel/detail.php`.
```
<?= $this->include('template/header'); ?>

<article class="entry">
    <h2><?= $artikel['judul']; ?></h2>
    <img src="<?= base_url('/gambar/' . $artikel['gambar']);?>" alt="<?=$artikel['judul']; ?>">
    <p><?= $artikel['isi']; ?></p>
</article>

<?= $this->include('template/footer'); ?>
```

![12](https://user-images.githubusercontent.com/22215113/122672960-79c54c80-d1f8-11eb-93fa-418080fe514b.png)

## Langkah 7 - Membuat Routing untuk artikel detail
Buka Kembali file `app/config/Routes.php`, kemudian tambahkan routing untuk artikel detail.
```
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
```

![13](https://user-images.githubusercontent.com/22215113/122672973-8cd81c80-d1f8-11eb-9313-d19b1e958132.png)
![14](https://user-images.githubusercontent.com/22215113/122672988-9feaec80-d1f8-11eb-95a7-2d39a3ecf0a1.png)

## Langkah 8 - Membuat Menu Admin
Buat method baru pada `Controller Artikel` dengan nama `admin_index()`. 
```
public function admin_index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();
        return view('artikel/admin_index', compact('artikel', 'title'));
    }
```
Kemudian buat view untuk tampilan admin dengan nama `admin_index.php`.
```
<?= $this->include('template/admin_header'); ?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php if($artikel): foreach($artikel as $row): ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td>
            <b><?= $row['judul']; ?></b>
            <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
        </td>
        <td><?= $row['status']; ?></td>
        <td>
            <a class="btn" href="<?= base_url('/admin/artikel/edit/' .$row['id']);?>">Ubah</a>
            <a class="btn btn-danger" onclick="return confirm('Yakin menghapus data?');" href="<?= base_url('/admin/artikel/delete/' .$row['id']);?>">Hapus</a>
        </td>
    </tr>
    <?php endforeach; else: ?>
    <tr>
        <td colspan="4">Belum ada data.</td>
    </tr>
    <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </tfoot>
</table>

<?= $this->include('template/admin_footer'); ?>
```

![16(1)](https://user-images.githubusercontent.com/22215113/122673141-577ffe80-d1f9-11eb-8194-b76e7ac7be54.png)
![16(2)](https://user-images.githubusercontent.com/22215113/122673144-59e25880-d1f9-11eb-9463-2da6c97a922a.png)

Tambahkan routing untuk menu admin seperti berikut:
```
$routes->group('admin', function($routes) {
  $routes->get('artikel', 'Artikel::admin_index');
  $routes->add('artikel/add', 'Artikel::add');
  $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
  $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});
```

Setelah itu buat template header dan footer baru untuk Halaman Admin.
Buat file baru dengan nama `admin_header.php` pada direktori `app/view/template`
```
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('/admin.css');?>">
</head>
<body>
    <div id="container">
    <header>
        <h1>Halaman Admin</h1>
    </header>
    <nav>
    <a href="<?= base_url('/admin/artikel');?>" class="active">Dashboard</a>
        <a href="<?= base_url('/artikel');?>">Artikel</a>
        <a href="<?= base_url('/admin/artikel/add');?>">Tambah Artikel</a>
    </nav>
    <section id="wrapper">
        <section id="main">
```

![19](https://user-images.githubusercontent.com/22215113/122673235-a9288900-d1f9-11eb-8634-cba1f4f9de2e.png)

Dan Buat file baru lagi dengan nama `admin_footer.php` pada direktori `app/view/template`
```
    <footer>
        <p>&copy; 2021 - Universitas Pelita Bangsa</p>
    </footer>
    </div>
</body>
</html>
```

![20](https://user-images.githubusercontent.com/22215113/122673247-bc3b5900-d1f9-11eb-8238-b8257c531284.png)

Kemudian buat file baru lagi dengan nama `admin.css` pada direktori `ci4/public` untuk mempercantik tampilan Halaman Admin.
```
/* Reset CSS */
* {
    margin: 0;
    padding: 0;
}
body {
    line-height:1;
    font-size:100%;
    font-family:'Open Sans', sans-serif;
    color:#5a5a5a;
}
#container {
    width: 980px;
    margin: 0 auto;
    box-shadow: 0 0 1em #cccccc;
}

/* header */
header {
    padding: 20px;
}
header h1 {
    margin: 20px 10px;
    color: #b5b5b5;
}

/* navigasi */
nav {
    display: block;
    background-color: #1f5faa;
}
nav a {
    padding: 15px 30px;
    display: inline-block;
    color: #ffffff;
    font-size: 14px;
    text-decoration: none;
    font-weight: bold;
}
nav a.active,
nav a:hover {
    background-color: #2b83ea;
}

/* footer */
footer {
    clear: both;
    background-color: #1d1d1d;
    padding: 20px;
    color:  #eee
}

/* ADMIN TABEL */
body{
    font-family: sans-serif;
}
table{
    border-collapse: collapse;
    margin: 20px;
    width: 95%;
}
table td{
    border: 1px solid #c9c9c9;
    font-size: 19px;
    padding: 10px 8px;
}
table th {
    background:#4d8cd4;
    color:#ffffff;
    font-size: 17px;
    text-align: left;
    border: 1px solid #c9c9c9;
    padding: 13px 15px;
}
table tr {
    background:#ffffff;
    text-align: left;
}
tr:hover{
    background: #e7e7e7;
}

/* ADMIN TOMBOL */
.btn{
    font-size: 14px;
    background-color: #afafaf;
    color: #444444;
    border-radius: 5px;
    padding: 10px 20px;
    margin-top: 8x;
    text-decoration: none;
}

.btn-danger{
    font-size: 14px;
    background-color: rgb(223, 35, 35);
    color: white;
    border-radius: 5px;
    padding: 10px 20px;
    margin-top: 8x;
    text-decoration: none;
}

a:active,
a:hover{
    opacity: 80%;
}

/* TAMBAH ARTIKEL */
textarea{
    width: 94%;
    padding: 10px;
    border: 2px solid gray;
    box-sizing: border-box;
    font-size: 15px;
    margin-left: 20px;
}

input[type=text]{
    width: 94%;
    padding: 10px;
    border: 2px solid gray;
    box-sizing: border-box;
    font-size: 15px;
    margin: 20px;   
}

input[type=submit]{
    padding: 10px;
    background-color: rgb(30, 117, 216);
    color: white;
    box-sizing: border-box;
    font-size: 15px;
    margin: 20px;   
}

input[type=submit]:active,
input[type=submit]:hover{
    opacity: 80%;
}

h2{
    margin-top: 20px;
    margin-left: 20px;
}
```

Akses menu admin dengan url http://localhost:8080/admin/artikel

![18](https://user-images.githubusercontent.com/22215113/122673331-176d4b80-d1fa-11eb-98b8-36a311f2b73c.png)

## Langkah 9 - Menambah Data Artikel
Tambahkan fungsi/method baru pada `Controller Artikel` dengan nama `add()`. 
```
    public function add()
    {
        // validasi data.
        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid)
        {
            $artikel = new ArtikelModel();
            $artikel->insert([
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'slug' => url_title($this->request->getPost('judul')),]);
            return redirect('admin/artikel');
        }
        $title = "Tambah Artikel";
        return view('artikel/form_add', compact('title'));
    }
```

![21](https://user-images.githubusercontent.com/22215113/122673372-51d6e880-d1fa-11eb-8e88-7c50d3435a62.png)

Kemudian buat view untuk form tambah dengan nama `form_add.php`
```
<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>
<form action="" method="post">
    <p>
        <input type="text" name="judul">
    </p>
    <p>
        <textarea name="isi" cols="50" rows="10"></textarea>
    </p>
    <p><input type="submit" value="Kirim" class="btn btn-large"></p>
</form>

<?= $this->include('template/admin_footer'); ?>
```

![22](https://user-images.githubusercontent.com/22215113/122673383-6ca95d00-d1fa-11eb-9df7-66d16b2feadc.png)

Klik menu `Tambah Artikel` dan inilah hasilnya.

![23](https://user-images.githubusercontent.com/22215113/122673407-85197780-d1fa-11eb-9af9-74a4b51d64a4.png)

## Langkah 10 - Mengubah Data
Tambahkan fungsi/method baru pada `Controller Artikel` dengan nama `edit()`. 
```
    public function edit($id)
    {
        $artikel = new ArtikelModel();

        // validasi data.
        $validation = \Config\Services::validation();
        $validation->setRules(['judul' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if ($isDataValid)
        {
            $artikel->update($id, [
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),]);
            return redirect('admin/artikel');
        }

        // ambil data lama
        $data = $artikel->where('id', $id)->first();
        $title = "Edit Artikel";
        return view('artikel/form_edit', compact('title', 'data'));
    }
```

![24](https://user-images.githubusercontent.com/22215113/122673430-9febec00-d1fa-11eb-8325-cf4ff45a44cd.png)

Kemudian buat view untuk form tambah dengan nama `form_edit.php`
```
<?= $this->include('template/admin_header'); ?>

<h2><?= $title; ?></h2>
<form action="" method="post">
    <p><input type="text" name="judul" value="<?= $data['judul'];?>" ></p>
    <p><textarea name="isi" cols="50" rows="10"><?=$data['isi'];?></textarea></p>
    <p><input type="submit" value="Kirim" class="btn btn-large"></p>
</form>

<?= $this->include('template/admin_footer'); ?>
```

![25](https://user-images.githubusercontent.com/22215113/122673461-c3169b80-d1fa-11eb-9086-3d972f040734.png)

Klik ubah pada salah satu artikel dan inilah hasilnya

![26](https://user-images.githubusercontent.com/22215113/122673498-e80b0e80-d1fa-11eb-9bcf-f7dbc1b865a7.png)

## Langkah 11 - Menghapus Data
Tambahkan fungsi/method baru pada `Controller Artikel` dengan nama `delete()`.
```
    public function delete($id)
    {
        $artikel = new ArtikelModel();
        $artikel->delete($id);
        return redirect('admin/artikel');
    }
```

![27](https://user-images.githubusercontent.com/22215113/122673525-0a9d2780-d1fb-11eb-974f-d9cc8c4d49ff.png)
