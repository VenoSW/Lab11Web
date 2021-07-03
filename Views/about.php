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