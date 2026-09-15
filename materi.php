<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pegawai";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully<br/>";
}

$table_name = 'sales';

$sql = 'CREATE TABLE IF NOT EXISTS `' . $table_name . '` (
    `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
    `id_produk` int(11) NOT NULL,
    `tgl_transaksi` date NOT NULL,
    `kuantitas` tinyint(4) NOT NULL,
    `harga` int(11) NOT NULL,
    `id_pelanggan` int(11) NOT NULL,
    PRIMARY KEY (`id_transaksi`),
    KEY `id_produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1';

$query = mysqli_query($conn, $sql);
if (!$query) {
    die ('ERROR: Tabel ' . $table_name . ' gagal dibuat: ' . mysqli_error($conn));
}
echo 'Tabel ' . $table_name . ' berhasil dibuat <br/>';

$sql = "INSERT IGNORE INTO `$table_name` (`id_transaksi`, `id_produk`, `tgl_transaksi`, `kuantitas`, `harga`, `id_pelanggan`)
    VALUES (1, 100, '2016-09-20', 8, 265000, 1),
           (2, 100, '2016-10-11', 3, 270000, 2),
           (3, 101, '2016-08-17', 8, 250000, 2),
           (4, 101, '2016-08-24', 12, 380000, 2),
           (5, 101, '2016-05-10', 12, 250000, 1)";

$query = mysqli_query($conn, $sql);
if (!$query) {
    die ('ERROR: Data gagal dimasukkan pada tabel ' . $table_name . ' : ' . mysqli_error($conn));
}
echo 'Data siap ditampilkan <br/><hr/>';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>

    <p>Menggunakan mysqli_fetch_array()</p>
    <table border = "1">
        <thead>
            <tr>
                <th>ID PRODUK</th>
                <th>TGL TRANSAKSI</th>
                <th>HARGA</th>
                <th>KUANTITAS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = 'SELECT id_produk, tgl_transaksi, harga, kuantitas FROM sales';
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
                echo '<tr>
                        <td>'.$row['id_produk'].'</td>
                        <td>'.$row['tgl_transaksi'].'</td>
                        <td>'.number_format($row['harga'], 0, ',', '.').'</td>
                        <td class="right">'.$row['kuantitas'].'</td>
                      </tr>';
            }
            mysqli_free_result($query);
            ?>
        </tbody>
    </table>

    <p>Menggunakan mysqli_fetch_assoc()</p>
    <table border = "1">
        <thead>
            <tr>
                <th>ID PRODUK</th>
                <th>TGL TRANSAKSI</th>
                <th>HARGA</th>
                <th>KUANTITAS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
                echo '<tr>
                        <td>'.$row['id_produk'].'</td>
                        <td>'.$row['tgl_transaksi'].'</td>
                        <td>'.number_format($row['harga'], 0, ',', '.').'</td>
                        <td class="right">'.$row['kuantitas'].'</td>
                      </tr>';
            }
            mysqli_free_result($query);
            ?>
        </tbody>
    </table>

    <p>Menggunakan mysqli_fetch_row()</p>
    <table border = "1">
        <thead>
            <tr>
                <th>ID PRODUK</th>
                <th>TGL TRANSAKSI</th>
                <th>HARGA</th>
                <th>KUANTITAS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_row($query)) {
                echo '<tr>
                        <td>'.$row[0].'</td>
                        <td>'.$row[1].'</td>
                        <td>'.number_format($row[2], 0, ',', '.').'</td>
                        <td class="right">'.$row[3].'</td>
                      </tr>';
            }
            mysqli_free_result($query);
            ?>
        </tbody>
    </table>

    <p>Temporary Field</p>
    <table border = "1">
        <thead>
            <tr>
                <th>ID PRODUK</th>
                <th>TGL TRANSAKSI</th>
                <th>KUANTITAS</th>
                <th>HARGA</th>
                <th>TOTAL BAYAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_total = 'SELECT id_produk, tgl_transaksi, harga, kuantitas, harga*kuantitas AS total_byr FROM sales';
            $query_total = mysqli_query($conn, $sql_total);
            while ($row = mysqli_fetch_array($query_total)) {
                echo '<tr>
                        <td>'.$row['id_produk'].'</td>
                        <td>'.$row['tgl_transaksi'].'</td>
                        <td>'.$row['kuantitas'].'</td>
                        <td>'.number_format($row['harga'], 0, ',', '.').'</td>
                        <td class="right">'.number_format($row['total_byr'], 0, ',', '.').'</td>
                      </tr>';
            }
            mysqli_free_result($query_total);
            ?>
        </tbody>
    </table>

</body>
</html>

<?php
mysqli_close($conn);
?>