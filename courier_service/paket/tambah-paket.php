<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Paket</title>
</head>
<body>
    <h3>Tambah Data Paket</h3>
    <form action="../paket/proses-tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Berat Paket</td>
                <td><input type="text" name="berat" required></td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td><input type="text" name="tujuan" required></td>
            </tr>
            <tr>
                <td>Biaya</td>
                <td><input type="text" name="biaya" required></td>
            </tr>
        </table>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    </form>
</body>
</html>