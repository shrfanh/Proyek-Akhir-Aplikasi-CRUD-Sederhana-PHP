<?php
session_start();
//menghubungkan file koneksi dengan index
include("../koneksi.php");

//periksa apakah tombol "simpan" pada form edit ditekan
if (isset($_POST['simpan'])) {

    //ambil data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $pelanggan_id = $_POST['pelanggan_id'];

    //buat query untuk memperbarui data siswa
    $sql = "UPDATE pelanggan SET 
            nama='$nama', 
            alamat='$alamat' 
            WHERE pelanggan_id=$pelanggan_id";

    $query = mysqli_query($db, $sql);

    //simpan pesan notifikasi dalam sesi berdasarkan hasil query 
    if ($query) {
        $_SESSION['notifikasi'] = "Data pelanggan berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Data pelanggan gagal diperbarui.";
    }

    //alihkan ke halaman index.php
    header('Location: index.php');

//jika akses langsung tanpa form, tampilkan pesan error    
} else {
    die("Akses ditolak..");
}
?>

