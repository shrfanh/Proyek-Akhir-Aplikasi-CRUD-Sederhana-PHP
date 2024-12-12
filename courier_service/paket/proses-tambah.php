<?php
//mulai sesi
session_start();
//menghubungkan file koneksi dengan index
include("../koneksi.php");

//mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])) {

     //mengambil nilai dari form input dan menyimpannya ke dalam variabel
    $berat = $_POST['berat'];
    $tujuan = $_POST['tujuan'];
    $biaya = $_POST['biaya'];

    //menyusun query SQL untuk menambahkan data ke tabel pelanggan
    $sql = "INSERT INTO paket 
            (berat, tujuan, biaya) 
            VALUES ('$berat', '$tujuan', '$biaya')";

    //menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

     //simpan pesan di sesi
    if ($query) {
        $_SESSION['notifikasi'] = "Data paket berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Data paket gagal ditambahkan.";
    }

    //alihkan ke halaman index.php
    header('Location: index.php');

//jika akses langsung tanpa id, tampilkan pesan error
} else {
    die("Akses ditolak..");
}

?>