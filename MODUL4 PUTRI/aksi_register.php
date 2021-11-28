<?php

include 'koneksi.php';
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    header('location: register.php?alert=password');
}

else {
    mysqli_query($koneksi, "INSERT into users values ('', '$nama', '$email', '$password', '$no_hp')");
    header('location: login.php?alert=registrasi_sukses');
}

?>