<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php">kembali</a>
    <h2>Edit Berita</h2>
    <?php
    include 'conn.php';
    $id = $_GET['id'];
    $data = mysqli_query($conn, "SELECT * FROM berita WHERE id='$id'");
    while($d = mysqli_fetch_array($data)){
    ?>
    <form method="post" action="update.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
        <input type="hidden" name="gambar_lama" value="<?php echo $d['gambar']; ?>">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" value="<?php echo $d['judul']; ?>" required></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis" value="<?php echo $d['penulis']; ?>" required></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="tanggal" value="<?php echo $d['tanggal']; ?>" required></td>
            </tr>
            <tr>
                <td>Isi</td>
                <td><textarea name="isi" rows="5" cols="40" required><?php echo $d['isi']; ?></textarea></td>
            </tr>
            <tr>
                <td>Gambar Saat Ini</td>
                <td><img src="<?php echo $d['gambar']; ?>" width="100"></td>
            </tr>
            <tr>
                <td>Ganti Gambar</td>
                <td><input type="file" name="gambar"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="submit">Update</button>
                </td>
            </tr>
        </table>
    </form>
    <?php
    }
    ?>
</body>

</html>
