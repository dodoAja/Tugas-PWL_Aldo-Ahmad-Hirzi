<?php
include 'conn.php';

$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tanggal = $_POST['tanggal'];
$isi = $_POST['isi'];

$tipe = $_FILES['gambar']['type'];
$data_file = file_get_contents($_FILES['gambar']['tmp_name']);
$gambar = 'data:' . $tipe . ';base64,' . base64_encode($data_file);

mysqli_query($conn, "INSERT INTO berita VALUES ('', '$judul', '$penulis', '$tanggal', '$isi', '$gambar')");
header("location:index.php");
?>
