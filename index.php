<?php
// ===== Data Profil =====
$nama    = "Andini Putri Malaya";
$jurusan = "Mahasiswa Sistem Informasi";
$kampus  = "Universitas Tanjungpura";
$fotoUrl = "layaimut.jpeg";

$headline1 = "Belajar dan bertumbuh,";
$headline2 = "satu semester penuh cerita.";

$tentangP1 = "Halo! Saya Andini, mahasiswa Sistem Informasi di Universitas Tanjungpura. 
Saat ini saya sedang belajar mengenal lebih jauh dunia teknologi, khususnya dalam pembuatan 
website menggunakan HTML, CSS, dan PHP. Bagi saya, belajar teknologi bukan hanya tentang 
menulis kode, tetapi juga tentang bagaimana sebuah ide dapat diwujudkan menjadi sesuatu 
yang berguna.";

$tentangP2 = "Selain menjalani kegiatan perkuliahan, saya juga senang mengikuti organisasi 
dan kepanitiaan di lingkungan kampus. Berbagai kegiatan tersebut memberikan banyak pengalaman 
baru, mulai dari bekerja sama dengan orang lain, belajar bertanggung jawab, hingga berani 
mengembangkan kemampuan diri.";


// ===== Cerita Jadwal Kuliah =====
$jadwal = [
    "Rabu pagi menjadi salah satu awal kesibukan saya di kampus. Ketika jam menunjukkan pukul 
    tujuh pagi, saya sudah bersiap mengikuti mata kuliah Multimedia. Perkuliahan berlangsung 
    hingga sekitar pukul setengah sepuluh. Dalam mata kuliah ini saya banyak belajar mengenai 
    dunia visual, media digital, serta bagaimana teknologi dapat digunakan untuk menghasilkan 
    karya yang menarik.",

    "Memasuki hari Kamis, kegiatan perkuliahan saya berlanjut pada siang hari. Pukul satu lewat 
    tiga puluh, saya mengikuti mata kuliah Kewirausahaan Teknologi Informasi hingga pukul empat 
    sore. Mata kuliah ini menjadi salah satu mata kuliah yang menarik karena saya belajar melihat 
    teknologi tidak hanya sebagai alat, tetapi juga sebagai peluang untuk membangun sebuah usaha 
    dan menciptakan inovasi.",

    "Jumat menjadi penutup kegiatan perkuliahan dalam minggu saya. Pada pukul tujuh lewat empat 
    puluh lima, saya mengikuti mata kuliah Manajemen Rantai Pasok hingga pukul sepuluh pagi. 
    Melalui mata kuliah ini saya mulai memahami bagaimana suatu produk, informasi, dan layanan 
    dapat bergerak dari satu pihak ke pihak lainnya secara terencana."
];


// ===== Cerita Hobi =====
$hobi = [
    "Di tengah kesibukan kuliah, saya selalu mencoba menyediakan waktu untuk melakukan hal-hal 
    yang saya sukai. Membaca novel menjadi salah satu kegiatan yang paling sering saya lakukan. 
    Bagi saya, membaca novel seperti memasuki dunia lain untuk sementara waktu. Dari setiap cerita, 
    saya dapat mengenal berbagai karakter, pengalaman, dan sudut pandang yang berbeda.",

    "Ketika ingin mencari hiburan bersama teman-teman, saya biasanya bermain Mobile Legends. 
    Walaupun hanya sebuah permainan, kegiatan tersebut menjadi salah satu cara sederhana bagi saya 
    untuk melepas penat setelah mengerjakan tugas atau mengikuti kegiatan kampus.",

    "Saya juga menyukai kegiatan berenang. Berada di dalam air memberikan suasana yang berbeda 
    dan membuat tubuh terasa lebih rileks. Selain itu, saya memiliki ketertarikan dalam membuat 
    desain poster digital. Saya senang mencoba menggabungkan tulisan, gambar, dan berbagai elemen 
    visual menjadi sebuah desain yang menarik.",

    "Fotografi juga menjadi kegiatan yang saya nikmati. Saya sering mengabadikan berbagai momen 
    sederhana menggunakan kamera ponsel. Dari kegiatan tersebut saya belajar bahwa sesuatu yang 
    terlihat biasa saja dapat terlihat lebih menarik apabila dilihat dari sudut pandang yang berbeda."
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profil <?= htmlspecialchars($nama) ?></title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="halaman">

    <!-- Garis ganda -->
    <div class="garis-ganda"></div>

    <!-- Judul utama -->
    <h1 class="judul-utama">
        <?= htmlspecialchars($nama) ?>
    </h1>

    <!-- Identitas -->
    <div class="byline">

        <span><?= htmlspecialchars($jurusan) ?></span>

        <span class="titik">●</span>

        <span><?= htmlspecialchars($kampus) ?></span>

        <span class="titik">●</span>

        <span>Profil Pribadi</span>

    </div>


    <!-- Headline dan Foto -->
    <div class="bagian-atas">

        <div class="headline-area">

            <h2 class="headline">
                <?= htmlspecialchars($headline1) ?><br>
                <?= htmlspecialchars($headline2) ?>
            </h2>

            <div class="garis-headline"></div>

            <p class="paragraf-pembuka">
                <?= htmlspecialchars($tentangP1) ?>
            </p>

        </div>


        <img
            src="<?= htmlspecialchars($fotoUrl) ?>"
            alt="Foto <?= htmlspecialchars($nama) ?>"
            class="foto-profil"
        >

    </div>


    <!-- Tentang saya -->
    <p class="paragraf-pembuka">
        <?= htmlspecialchars($tentangP2) ?>
    </p>


    <hr class="pemisah">


    <!-- Isi Dua Kolom -->
    <div class="isi-dua-kolom">


        <!-- Kolom Jadwal -->
        <div class="kolom">

            <h3 class="judul-bagian">
                Hari-hari di Kampus
            </h3>

            <?php foreach ($jadwal as $cerita): ?>

                <p>
                    <?= htmlspecialchars($cerita) ?>
                </p>

            <?php endforeach; ?>

        </div>


        <!-- Kolom Hobi -->
        <div class="kolom">

            <h3 class="judul-bagian">
                Cerita di Waktu Luang
            </h3>

            <?php foreach ($hobi as $cerita): ?>

                <p>
                    <?= htmlspecialchars($cerita) ?>
                </p>

            <?php endforeach; ?>

        </div>


    </div>


    <!-- Footer -->
    <p class="kredit">
        Ditulis oleh: <?= htmlspecialchars($nama) ?> |
        Sistem Informasi — Universitas Tanjungpura
    </p>


</div>

</body>
</html>