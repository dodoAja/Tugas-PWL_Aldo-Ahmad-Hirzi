<?php
include 'conn.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM berita WHERE id='$id'");
header("location:index.php");
?>
