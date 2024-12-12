<?php

session_start();
//menghubungkan file koneksi dengan index
include("../koneksi.php");

if (isset($_GET['pelanggan_id'])) {
    //ambil id dari URL
    $pelanggan_id = $_GET['pelanggan_id'];

    //buat query untuk menghapus data paket berdasarkan id
    $sql = "DELETE FROM pelanggan WHERE pelanggan_id=$pelanggan_id";
    $query = mysqli_query($db, $sql);

    //simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data pelanggan berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Data pelanggan gagal dihapus.";
    }

    //alihkan ke halaman index.php
    header('Location: index.php');

//jika akses langsung tanpa id, tampilkan pesan error
} else {
    die("Akses ditolak..");
}

?>

