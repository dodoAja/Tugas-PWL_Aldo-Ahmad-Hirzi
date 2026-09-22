<?php 
$conn = mysqli_connect("localhost", "root", "", "portalberita");

if(mysqli_connect_errno()){
    echo "koneksi gagal : " . mysqli_connect_error(); 
}
?>