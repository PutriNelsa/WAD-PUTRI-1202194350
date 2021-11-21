<?php
include 'Putri_koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi,"DELETE FROM buku_table WHERE id_buku='$id'");
header('location: Putri_home.php');
?>