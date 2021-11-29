    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/8e606f1b84.js" crossorigin="anonymous"></script>
        <title>Document</title>
    </head>
    <body class="bg-warning bg-opacity-10 d-flex flex-column min-vh-100">
        <?php
        session_start(); 
        if(isset($_COOKIE['status'])){
            ?>
        <?php
            if ( isset($_COOKIE['warna']) ) {
                $warna = $_COOKIE['warna'];
                if ($warna == 'light') {
                ?>
                <nav class="navbar navbar-expand-lg navbar-light bg-primary bg-opacity-50">
                    <?php
                }
                else if ($warna == 'dark') {
                    ?>
                    <nav class="navbar navbar-expand-lg navbar-dark bg-black bg-gradient">
                        <?php
                }
            }
            else {
                ?>
                <nav class="navbar navbar-expand-lg navbar-light bg-primary bg-opacity-50">
                <?php
            }
        ?>
            <div class="container">
                <a class="navbar-brand fw-bold" href="index.php">EAD Travel</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                </div>
                <form class="form-inline my-2 my-lg-0 navbar-nav">
                    <ul class="navbar-nav navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link" href="booking.php"><i class="fas fa-shopping-cart"></i></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Menu
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="profil.php">Pengaturan Profil</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </form>
            </div>
        </nav>
        
        <?php 
        if(isset($_GET['alert'])){
            if($_GET['alert']=='password'){
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Update Profil Gagal!</strong> Pastikan Password anda sesuai!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>								
                <?php
            }
            else if($_GET['alert']=='update_berhasil'){
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil Update Profil</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>								
                <?php
            }
        }?>

        <div class="main">
            <div class="container">
                <div class="bg-white mt-5 p-3">
                    <h4 class="text-center">Profile</h4>
                    <form action="update_profil.php" method="post">
                        <?php
                        include 'koneksi.php';
                        
                        $id = $_SESSION['id'];
                        $data = mysqli_query($koneksi, "select * from users where id='$id'");
                        while($d = mysqli_fetch_array($data)){
                        ?>
                        <div class="row my-4">
                            <div class="col-3">
                                Email
                            </div>
                            <div class="col-9">
                                <input type="hidden" name="id" class="form-control" value="<?php echo $d['id']; ?>">
                                <?=$d['email']?>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-3">
                                Nama
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" name="nama" value="<?=$d['nama']?>">
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-3">
                                Nomor Handphone
                            </div>
                            <div class="col-9">
                                <input type="text" class="form-control" name="no_hp" value="<?=$d['no_hp']?>">
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col">
                                <hr>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-3">
                                Kata Sandi
                            </div>
                            <div class="col-9">
                                <input type="password" class="form-control" name="password" placeholder="Kata Sandi" required>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-3">
                                Konfirmasi Kata Sandi
                            </div>
                            <div class="col-9">
                                <input type="password" class="form-control" name="confirm_password" placeholder="Konfirmasi Kata Sandi" required>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-3">
                                Warna Navbar
                            </div>
                            <div class="col-9">
                                <select class="form-select" name="warna">
                                    <option selected disabled>Warna Navbar</option>
                                    <option value="light">Blue Ocean</option>
                                    <option value="dark">Dark Boba</option>
                                </select>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col">
                                <center>
                                    <button type="submit" class="btn btn-primary" style="width:10%">Simpan</button>
                                    <a href="index.php" class="btn btn-warning" style="width:10%">Cancel</a>
                                </center>
                            </div>
                        </div>
                        
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>

            <?php
        }
        else {
            header("Location: login.php");
            ?>

        <?php    
        }
        ?>
    
    <?php
            if ( isset($_COOKIE['warna']) ) {
                $warna = $_COOKIE['warna'];
                if ($warna == 'light') {
                ?>
                <footer class="bg-primary bg-opacity-50 mt-auto">
                    <?php
                }
                else if ($warna == 'dark') {
                    ?>
                <footer class="bg-dark text-white mt-auto">
                        <?php
                }
            }
            else {
                ?>
                <footer class="bg-primary bg-opacity-50 mt-auto">
                <?php
            }
        ?>
            <div class="container">
                <p class="text-center m-3">&copy;<?=date("Y");?> Copyright: <a href="#" data-bs-toggle="modal" data-bs-target="#createdBy"> Putri_1202194350</a></p>
            </div>
            <div class="modal fade" id="createdBy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-black" id="exampleModalLabel">Created By</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row text-black">
                            <div class="col-2">Nama</div>
                            <div class="col-1">:</div>
                            <div class="col-9">Putri</div>
                        </div>
                        <div class="row text-black">
                            <div class="col-2">NIM</div>
                            <div class="col-1">:</div>
                            <div class="col-9">1202194350</div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </body>
    </html>