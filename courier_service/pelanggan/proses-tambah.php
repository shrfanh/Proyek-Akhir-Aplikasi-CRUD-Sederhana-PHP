<?php

session_start();
//menghubungkan file koneksi dengan index
include("../koneksi.php");

//mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])) {

    //mengambil nilai dari form input dan menyimpannya ke dalam variabel
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];

    //menyusun query SQL untuk menambahkan data ke tabel pelanggan
    $sql = "INSERT INTO pelanggan 
    (nama, alamat)
    VALUES ('$nama', '$alamat')";

    //menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    //simpan pesan di sesi
    if ($query) {
        $_SESSION['notifikasi'] = "Data pelanggan berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Data pelanggan gagal ditambahkan.";
    }

    //alihkan ke halaman index.php
    header('Location: index.php');

//jika akses langsung tanpa id, tampilkan pesan error
} else {
    die("Akses ditolak..");
}

?>