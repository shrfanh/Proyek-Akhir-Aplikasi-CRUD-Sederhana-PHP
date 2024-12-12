<?php
//memulai sesi
session_start();
//menghubungkan file koneksi dengan index
include("../koneksi.php");

//periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {

    //ambil data dari form
    $berat = $_POST['berat'];
    $tujuan = $_POST['tujuan'];
    $biaya = $_POST['biaya'];
    $paket_id = $_POST['paket_id'];

    //buat query untuk memperbarui data siswa
    $sql = "UPDATE paket SET
    berat='$berat',
    tujuan='$tujuan',
    biaya='$biaya'
    WHERE paket_id=$paket_id";

    $query = mysqli_query($db, $sql);

    //simpan pesan notifikasi dalam sesi berdasarkan hasil query 
    if ($query) {
        $_SESSION['notifikasi'] = "Data Paket berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data paket gagal diperbarui.";
    }

    //alihkan ke halaman index.php
    header('Location: index.php');

//jika akses langsung tanpa form, tampilkan pesan error    
} else {
    die("Akses ditolak..");
}
?>

