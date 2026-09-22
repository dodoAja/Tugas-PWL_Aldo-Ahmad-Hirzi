<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1 align="center">PORTAL BERITA ONLINE</h1>

    <table width="100%" border="0" cellpadding="5">
        <tr>
            <td width="75%" valign="top">

                <h2>Berita Terbaru</h2>
                <p><a href="tambah.php">Tambah Berita</a></p>
                <hr>

                <?php
                include 'conn.php';
                $data = mysqli_query($conn, "SELECT * FROM berita");
                while($row = mysqli_fetch_array($data)){
                ?>
                <table width="100%" border="0" cellpadding="5">
                    <tr>
                        <td width="130" valign="top">
                            <img src="<?php echo $row['gambar']; ?>" width="120" alt="Foto Berita">
                        </td>
                        <td valign="top">
                            <h3><?php echo $row['judul']; ?></h3>
                            <p>
                                <b>Penulis:</b> <?php echo $row['penulis']; ?>
                                <b>Tanggal:</b> <?php echo $row['tanggal']; ?>
                            </p>
                            <p>
                                <?php echo $row['isi']; ?>
                            </p>
                            <p>
                                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                                <a href="hapus.php?id=<?php echo $row['id']; ?>">Hapus</a>
                            </p>
                        </td>
                    </tr>
                </table>
                <hr>
                <?php
                }
                ?>
            </td>
        </tr>
    </table>
</body>
</html>