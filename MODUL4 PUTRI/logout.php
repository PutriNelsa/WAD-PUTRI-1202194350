<?php 
session_start();
session_destroy();

setcookie('modul4', '', time() - 86400);
setcookie('pesan', '', time() - 86400);
setcookie('warna', '', time() - 86400);

header("location:login.php?alert=logout");
?>