<?php
//menentukan nama host, biasanya "localhost"
$server = "localhost";
//nama pengguna MySql (default: root)
$user = "root";
//kata sandi untuk pengguna MySql (default: kosong untuk root)
$password = "";
// nama basis data yang akan dihubungkan
$nama_database = "courier_service";

//mencoba untuk membuat koneksi ke basis data
$db = mysqli_connect($server, $user, $password, $nama_database);

//memeriksa apakah koneksi berhasil
if (!$db) {
    die("Gagal terhubung dengan database". mysqli_connect_error());
}
?>