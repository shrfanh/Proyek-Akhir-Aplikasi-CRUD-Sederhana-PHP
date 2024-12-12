<?php
//menghubungkan file koneksi dengan index
include("../koneksi.php");

//mengambil id pelanggan dari parameter URL
$pelanggan_id = $_GET['pelanggan_id'];

//mengambil data paket dari database berdasarkan id
$query = $db->query("SELECT * FROM pelanggan WHERE pelanggan_id='$pelanggan_id'");
$pelanggan = $query->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Paket</title>
</head>
<body>
    <h3>Edit Data Paket</h3>
    <form action="../pelanggan/proses-edit.php" method="POST">
        <input type="hidden" name="pelanggan_id" value="<?php echo $pelanggan['pelanggan_id']; ?>">
        <table border="0">
            <tr>
                <td>Nama Pelanggan</td>
                <td>
                    <input type="text" name="nama" value="<?php echo $pelanggan['nama']; ?>">
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <textarea name="alamat"><?php echo $pelanggan['alamat']; ?></textarea>
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>