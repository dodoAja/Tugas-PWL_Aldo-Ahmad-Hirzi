<?php
include 'conn.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tanggal = $_POST['tanggal'];
$isi = $_POST['isi'];

if (!empty($_FILES['gambar']['tmp_name'])) {
    $tipe = $_FILES['gambar']['type'];
    $data_file = file_get_contents($_FILES['gambar']['tmp_name']);
    $gambar = 'data:' . $tipe . ';base64,' . base64_encode($data_file);
} else {
    $gambar = $_POST['gambar_lama'];
}

mysqli_query($conn, "UPDATE berita SET judul='$judul', penulis='$penulis', tanggal='$tanggal', isi='$isi', gambar='$gambar' WHERE id='$id'");
header("location:index.php");
?>
