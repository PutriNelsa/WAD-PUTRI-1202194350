<?php
include 'koneksi.php';
session_start();

if(isset($_SESSION['status'])){

    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        header('location: profil.php?alert=password');
    }

    else {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $no_hp = $_POST['no_hp'];

        mysqli_query($koneksi, "UPDATE users SET nama='$nama', no_hp='$no_hp', password='$password' WHERE id='$id'");
        header ("location:profil.php?alert=update_berhasil");
    }

    if (isset($_POST['warna'])) {
        $warna = $_POST['warna'];
        setcookie('warna', $warna, time() + 86400);
    }
}

?>