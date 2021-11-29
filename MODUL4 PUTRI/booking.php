<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/8e606f1b84.js" crossorigin="anonymous"></script>
        <title>Document</title>
</head>
<body class="bg-warning bg-opacity-10 d-flex flex-column min-vh-100">
    <?php
    session_start(); 
    if(isset($_SESSION['status'])){
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
                if($_GET['alert']=='delete'){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Berhasil dihapus!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>							
                    <?php
                }
        }?>

        <div class="main">
            <div class="container">
                <div class="bg-white mt-5 p-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tempat</th>
                                <th>Lokasi</th>
                                <th>Tanggal Perjalanan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'koneksi.php';
                            $no = 1;
                            $id = $_SESSION['id'];
                            $data = mysqli_query($koneksi, "select * from bookings where user_id='$id'");
                            while($d = mysqli_fetch_array($data)) {
                            ?>
                            <tr>
                                <td class="fw-bold"><?=$no++?></td>
                                <td><?=$d['nama_tempat']?></td>
                                <td><?=$d['lokasi']?></td>
                                <td><?=$d['tanggal']?></td>
                                <td><?=$d['harga']?></td>
                                <td><a href="delete.php?<?=$d['id']?>" class="btn btn-danger">Delete</a></td>
                            </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <?php
                                $total = mysqli_query($koneksi, "select sum(harga) as total from bookings where user_id='$id'");
                                while ($t = mysqli_fetch_array($total)) {
                                ?>
                                <td colspan="4" class="fw-bold">Total</td>
                                <td colspan="2" class="fw-bold"><?=$t['total']?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
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