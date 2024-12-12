<?php
//menghubungkan file koneksi dengan index
include("../koneksi.php");

//mengambil id pelanggan dari parameter URL
$paket_id = $_GET['paket_id'];

//mengambil data paket dari database berdasarkan id
$query = $db->query("SELECT * FROM paket WHERE paket_id='$paket_id'");
$paket = $query->fetch_assoc();

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
    <form action="../paket/proses-edit.php" method="POST">
        <input type="hidden" name="paket_id" value="<?php echo $paket['paket_id']; ?>">
        <table border="0">
            <tr>
                <td>Berat</td>
                <td>
                    <input type="text" name="berat" value="<?php echo $paket['berat']; ?>">
                </td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td>
                    <input type="text" name="tujuan" value="<?php echo $paket['tujuan']; ?>">
                </td>
            </tr>
            <tr>
                <td>Biaya</td>
                <td>
                    <input type="text" name="biaya" value="<?php echo $paket['biaya']; ?>">
                </td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>