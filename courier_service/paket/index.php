<?php
//menghubungkan file koneksi dengan index
include("../koneksi.php");
//memulai sesi
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier Service</title>
    <!-- membuat styling  -->
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href="../paket/index.php">Data Paket</a></li>
        <li><a href="../pelanggan/index.php">Data Pelanggan</a></li>
    </ul>
    <h2>Data Paket</h2>

    <!-- tampilkan notifikasi jika ada -->
    <?php if (isset($_SESSION['notifikasi'])): ?>
        <p><?php echo $_SESSION['notifikasi']; ?></p>
        <!-- hapus notifikasi setelah ditampilkan -->
        <?php unset ($_SESSION['notifikasi']); ?>
    <?php endif; ?>
    <table>
        <thead>
            <tr align="center">
                <th>#</th>
                <th>Berat</th>
                <th>Tujuan</th>
                <th>Biaya</th>
                <th><a href="../paket/tambah-paket.php">Tambah Data</a></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1; //membuat penomoran data dari 1
            //membuat variable untuk menjalankan query SQL
            $query = $db->query("SELECT * FROM paket");
            //perulangan while akan terus berjalan (menampilkan data) selama kondisi $query bernilai true
            while ($paket = $query->fetch_assoc()) {
                //fetch_assoc digunakan untuk mengambil data perulangan dalam bentuk array
            ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $paket['berat'] ?></td>
                <td><?php echo $paket['tujuan'] ?></td>
                <td><?php echo $paket['biaya'] ?></td>
                <td align="center">
                    <!-- URL ke halaman edit data dengan menggunakan parameter paket_id pada kolom table -->
                    <a href="../paket/edit-paket.php?paket_id=<?php echo $paket['paket_id'] ?>">Edit</a>
                    <!-- URL ke halaman menghapus data dengan menggunakan parameter paket_id pada kolom table dan konfirmasi hapus data -->
                    <a onclick="return confirm('Anda yakin ingin mengapus data?')" href="../paket/hapus-paket.php?paket_id=<?php echo $paket['paket_id'] ?>">Hapus</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <!-- menghitung jumlah baris yang ada pada table -->
    <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>