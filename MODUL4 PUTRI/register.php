    <?php

    include 'koneksi.php';
    session_start();

    if ( isset($_COOKIE['modul4']) && isset($_COOKIE['pesan'])) {
        $modul4 = $_COOKIE['modul4'];
        $pesan = $_COOKIE['pesan'];

        $result = mysqli_query($koneksi, "select * from users where id='$modul4'");
        $row = mysqli_fetch_assoc($result);

        if ($pesan === hash('sha256', $row['email'])) {
            $_SESSION['status'] = true;
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
        }
    }

    if ( isset($_SESSION['status']) ) {
        header('location:index.php');
        exit;
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Document</title>
    </head>
    <body class="bg-warning bg-opacity-10 d-flex flex-column min-vh-100">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-primary bg-opacity-50">
            <div class="container">
                <a class="navbar-brand fw-bold" href="index.php">EAD Travel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                </div>
                <form class="form-inline my-2 my-lg-0 navbar-nav">
                    <a class="nav-item nav-link active" href="register.php">Register</a>
                    <a class="nav-item nav-link" href="login.php">Login</a>
                </form>
            </div>
        </nav>

        <?php 
        if(isset($_GET['alert'])){
            if($_GET['alert']=='password'){
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Registrasi Gagal!</strong> Pastikan Password anda sesuai!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>								
                <?php
            }
        }?>

        <div class="main">
            <div class="container">
                <div class="p-3 my-5 bg-white col-4 mx-auto">
                    <form action="aksi_register.php" method="post">
                        <h4 class="text-center">Register</h4>
                        <hr>
                        <div class="form-group mx-3">
                            <label class="mb-1" for="">Nama</label>
                            <input type="text" class="form-control mb-3" id="" name="nama" value="" placeholder="Masukkan Nama Lengkap">
                        </div>
                        <div class="form-group mx-3">
                            <label class="mb-1" for="">Email</label>
                            <input type="text" class="form-control mb-3" id="" name="email" value="" placeholder="Masukkan Alamat E-Mail">
                        </div>
                        <div class="form-group mx-3">
                            <label class="mb-1" for="">Nomor Handphone</label>
                            <input type="text" class="form-control mb-3" id="" name="no_hp" value="" placeholder="Masukkan Nomor Handphone">
                        </div>
                        <div class="form-group mx-3">
                            <label class="mb-1" for="">Kata Sandi</label>
                            <input type="password" class="form-control mb-3" id="" name="password" value="" placeholder="Kata Sandi Anda">
                        </div>
                        <div class="form-group mx-3">
                            <label class="mb-1" for="">Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control mb-3" id="" name="confirm_password" value="" placeholder="Konfirmasi Kata Sandi Anda">
                        </div>
                        
                        <center>
                            <input type="submit" class="btn btn-primary" style="width: 50%;" value="Daftar">
                            <label for="" class="my-3">Anda sudah punya akun? <a href="login.php">Login</a></label>
                        </center>

                    </form>
                </div>
            </div>
        </div>

        <footer class="bg-primary bg-opacity-50 mt-auto">
            <div class="container">
                <p class="text-center m-3">&copy;<?=date("Y");?> Copyright: Putri_1202194350</p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </body>
    </html>