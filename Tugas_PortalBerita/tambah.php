<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php">kembali</a>
    <h2>Tambah Berita</h2>
    <form method="POST" action="tambah_action.php" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" required></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis" required></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="tanggal" required></td>
            </tr>
            <tr>
                <td>Isi</td>
                <td><textarea name="isi" rows="5" cols="40" required></textarea></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><input type="file" name="gambar" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="submit">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
