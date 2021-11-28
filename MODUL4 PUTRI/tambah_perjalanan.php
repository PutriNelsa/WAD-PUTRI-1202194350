<?php
include 'koneksi.php';
session_start();

if(isset($_SESSION['status'])){

    $id = $_POST['user_id'];
    $nama_tempat = $_POST['nama_tempat'];
    $lokasi = $_POST['lokasi'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['tanggal'];

    mysqli_query($koneksi, "INSERT into bookings (user_id, nama_tempat, lokasi, harga, tanggal) values ('$id', '$nama_tempat', '$lokasi', '$harga', '$tanggal')");
    header ("location:index.php?alert=tambah_berhasil");
}

?>