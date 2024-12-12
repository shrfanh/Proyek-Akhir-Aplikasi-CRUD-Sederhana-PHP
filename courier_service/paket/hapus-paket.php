<?php
//memulai sesi
session_start();
//menghubungkan file koneksi dengan index
include("../koneksi.php");

//periksa apakah ada id yang dikirim melalui URL
if (isset($_GET['paket_id'])) {
    //ambil id dari URL
    $paket_id = $_GET['paket_id'];

    //buat query untuk menghapus data paket berdasarkan id
    $sql = "DELETE FROM paket WHERE paket_id=$paket_id";
    $query = mysqli_query($db, $sql);

    //simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Data paket berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Data paket gagal dihapus.";
    }

    //alihkan ke halaman index.php
    header('Location: index.php');

//jika akses langsung tanpa id, tampilkan pesan error
} else {
    die("Akses ditolak..");
}

?>

