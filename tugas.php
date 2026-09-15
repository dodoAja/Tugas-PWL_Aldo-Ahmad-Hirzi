<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tgs_2507411083_aldo_mysql";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully<br/>";
}

$table_name = 'mahasiswa';


$sql = 'CREATE TABLE IF NOT EXISTS `' . $table_name . '` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nama` varchar(20) NOT NULL,
    `nim` int(5) NOT NULL,
    `tugas` int(5) NOT NULL,
    `uts` int(5) NOT NULL,
    `uas` int(5) NOT NULL,
    `id_pelanggan` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    KEY `id_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1';

$query = mysqli_query($conn, $sql);
if (!$query) {
    die ('ERROR: Tabel ' . $table_name . ' gagal dibuat: ' . mysqli_error($conn));
}
echo 'Tabel ' . $table_name . ' berhasil dibuat <br/>';

$sql = "INSERT IGNORE INTO `$table_name` (`nama`, `nim`, `tugas`, `uts`, `uas`, `id_pelanggan`)
    VALUES ('Aldo', 12345, 80, 75, 85, 1),
           ('Nayla', 67890, 70, 80, 75, 2),
           ('Revaldo', 54321, 90, 85, 95, 2),
           ('Mamat', 09876, 85, 90, 80, 2),
           ('Rasya', 98765, 75, 80, 70, 1)";

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
                <th>ID</th>
                <th>NAMA</th>
                <th>NIM</th>
                <th>NILAI AKHIR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = 'SELECT id, nama, nim, (tugas + uts + uas)/3 AS nilai_akhir FROM mahasiswa';
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
                echo '<tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['nama'].'</td>
                        <td>'.$row['nim'].'</td>
                        <td>'.$row['nilai_akhir'].'</td>
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
                <th>ID</th>
                <th>NAMA</th>
                <th>NIM</th>
                <th>NILAI AKHIR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
                echo '<tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['nama'].'</td>
                        <td>'.$row['nim'].'</td>
                        <td>'.$row['nilai_akhir'].'</td>
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
                <th>ID</th>
                <th>NAMA</th>
                <th>NIM</th>
                <th>NILAI AKHIR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_row($query)) {
                echo '<tr>
                        <td>'.$row[0].'</td>
                        <td>'.$row[1].'</td>
                        <td>'.$row[2].'</td>
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
                <th>ID</th>
                <th>NAMA</th>
                <th>NIM</th>
                <th>NILAI AKHIR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_total = 'SELECT id, nama, nim, (tugas + uts + uas)/3 AS nilai_akhir FROM mahasiswa';
            $query_total = mysqli_query($conn, $sql_total);
            while ($row = mysqli_fetch_assoc($query_total)) {
                echo '<tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['nama'].'</td>
                        <td>'.$row['nim'].'</td>
                        <td>'.$row['nilai_akhir'].'</td>
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