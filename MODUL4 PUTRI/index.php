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
    <!--  -->
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
        if($_GET['alert']=='login'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil Login
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>							
            <?php
        }
        else if($_GET['alert']=='tambah_berhasil'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil memesan tiket
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>							
            <?php
        }
    }?>

    <div class="main">
        <div class="container">
            <div class="p-3 mt-2 mb-2 bg-success bg-opacity-50 mx-auto">
                <h1 class="text-center my-5">EAD Travel</h1>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="card" style="width:100%; height:715px;">
                        <img src="assets/img/raja ampat.jpg" class="card-img-top" alt="" style="width:100%; object-fit:cover; height:300px;">
                        <div class="card-body">
                            <h5 class="card-title">Raja Ampat, Papua</h5>
                            <p class="card-text">Kepulauan Raja Ampat adalah kepulauan Indonesia
                               di ujung barat laut Semenanjung Kepala Burung di Papua Barat.
                               Terdiri dari ratusan pulau yang tertutup hutan, Raja Ampat dikenal dengan
                               pantai dan terumbu karangnya yang kaya dengan kehidupan laut. Lukisan
                               batu dan gua kuno berada di Pulau Misool, sedangkan cendrawasih merah hidup
                               di Pulau Waigeo. Batanta dan Salawati adalah pulau-pulau utama lainnya
                               di nusantara.
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item fw-bold">Rp. 7.000.000</li>
                            <li class="list-group-item"> 
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#RajaAmpat">
                                Pesan Tiket
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width:100%; height:715px;">
                        <img src="assets/img/gunung bromo.jpg" class="card-img-top" alt="" style="width:100%; object-fit:cover; height:300px;">
                        <div class="card-body">
                            <h5 class="card-title">Gunung Bromo, Malang</h5>
                            <p class="card-text">Gunung Bromo adalah gunung berapi somma aktif dan bagian dari 
                                pegunungan Tengger, di Jawa Timur, Indonesia. Pada 2.329 meter itu bukan puncak tertinggi dari massif,
                                tetapi yang paling terkenal. Kawasan ini merupakan salah satu destinasi wisata yang paling banyak dikunjungi
                                di Jawa Timur, dan gunung berapi ini termasuk dalam Taman Nasional Bromo Tengger Semeru.
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item fw-bold">Rp. 2.000.000</li>
                            <li class="list-group-item"> 
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#GunungBromo">
                                Pesan Tiket
                            </button> 
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width:100%; height:715px;">
                        <img src="assets/img/tanah lot.jpg" class="card-img-top" alt="" style="width:100%; object-fit:cover; height:300px;">
                        <div class="card-body">
                            <h5 class="card-title">Tanah Lot, Bali</h5>
                            <p class="card-text">Tanah Lot adalah formasi batuan di lepas pantai pulau Bali, Indonesia. Ini adalah rumah bagi kuil ziarah Hindu
                                kuno Pura Tanah Lot, ikon wisata dan budaya yang populer untuk fotografi. Di sini ada dua pura yang terletak di atas batu besar. Satu 
                                terletak di atas bongkahan batu dan satunya terletak di atas tebing mirip dengan Pura Uluwatu. Pura Tanah Lot ini 
                                merupakan bagian dari Pura Dang Kahyangan
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item fw-bold">Rp. 5.000.000</li>
                            <li class="list-group-item">
                            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#TanahLot">
                                Pesan Tiket
                            </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Start -->
        <div class="modal fade" id="RajaAmpat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tanggal Perjalanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $id = $_SESSION['id'];
                    ?>
                    <form action="tambah_perjalanan.php" method="post">
                        <input type="hidden" class="form-control" name="user_id" value="<?=$id;?>">
                        <input type="hidden" class="form-control" name="nama_tempat" value="Raja Ampat">
                        <input type="hidden" class="form-control" name="lokasi" value="Bali">
                        <input type="hidden" class="form-control" name="harga" value="7000000">
                        <input type="date" class="form-control" name="tanggal" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->
        <!-- Modal Start -->
        <div class="modal fade" id="GunungBromo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tanggal Perjalanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $id = $_SESSION['id'];
                    ?>
                    <form action="tambah_perjalanan.php" method="post">
                        <input type="hidden" class="form-control" name="user_id" value="<?=$id;?>">
                        <input type="hidden" class="form-control" name="nama_tempat" value="Gunung Bromo">
                        <input type="hidden" class="form-control" name="lokasi" value="Malang">
                        <input type="hidden" class="form-control" name="harga" value="2000000">
                        <input type="date" class="form-control" name="tanggal" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->
        <!-- Modal Start -->
        <div class="modal fade" id="TanahLot" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tanggal Perjalanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $id = $_SESSION['id'];
                    ?>
                    <form action="tambah_perjalanan.php" method="post">
                        <input type="hidden" class="form-control" name="user_id" value="<?=$id;?>">
                        <input type="hidden" class="form-control" name="nama_tempat" value="Tanah Lot">
                        <input type="hidden" class="form-control" name="lokasi" value="Bali">
                        <input type="hidden" class="form-control" name="harga" value="5000000">
                        <input type="date" class="form-control" name="tanggal" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->
    </div>

        <?php
    }
    else {
        ?>
    <!-- belum login -->
     <nav class="navbar navbar-expand-lg navbar-light bg-primary bg-opacity-50">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">EAD Travel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            </div>
            <form class="form-inline my-2 my-lg-0 navbar-nav">
                <a class="nav-item nav-link" href="register.php">Register</a>
                <a class="nav-item nav-link" href="login.php">Login</a>
            </form>
        </div>
    </nav>

    <div class="main">
        <div class="container">
            <div class="p-3 mt-2 mb-2 bg-success bg-opacity-50 mx-auto">
                <h1 class="text-center my-5">EAD Travel</h1>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="card" style="width:100%; height:715px;">
                        <img src="assets/img/raja ampat.jpg" class="card-img-top" alt="" style="width:100%; object-fit:cover; height:300px;">
                        <div class="card-body">
                            <h5 class="card-title">Raja Ampat, Papua</h5>
                            <p class="card-text">Kepulauan Raja Ampat adalah kepulauan Indonesia
                               di ujung barat laut Semenanjung Kepala Burung di Papua Barat.
                               Terdiri dari ratusan pulau yang tertutup hutan, Raja Ampat dikenal dengan
                               pantai dan terumbu karangnya yang kaya dengan kehidupan laut. Lukisan
                               batu dan gua kuno berada di Pulau Misool, sedangkan cendrawasih merah hidup
                               di Pulau Waigeo. Batanta dan Salawati adalah pulau-pulau utama lainnya
                               di nusantara.
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item fw-bold">Rp. 7.000.000</li>
                            <li class="list-group-item"> <a href="login.php" class="btn btn-primary w-100">Pesan Tiket</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width:100%; height:715px;">
                        <img src="assets/img/gunung bromo.jpg" class="card-img-top" alt="" style="width:100%; object-fit:cover; height:300px;">
                        <div class="card-body">
                            <h5 class="card-title">Gunung Bromo, Malang</h5>
                            <p class="card-text">Gunung Bromo adalah gunung berapi somma aktif dan bagian dari 
                                pegunungan Tengger, di Jawa Timur, Indonesia. Pada 2.329 meter itu bukan puncak tertinggi dari massif,
                                tetapi yang paling terkenal. Kawasan ini merupakan salah satu destinasi wisata yang paling banyak dikunjungi
                                di Jawa Timur, dan gunung berapi ini termasuk dalam Taman Nasional Bromo Tengger Semeru.
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item fw-bold">Rp. 2.000.000</li>
                            <li class="list-group-item"> <a href="login.php" class="btn btn-primary w-100">Pesan Tiket</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card" style="width:100%; height:715px;">
                        <img src="assets/img/tanah lot.jpg" class="card-img-top" alt="" style="width:100%; object-fit:cover; height:300px;">
                        <div class="card-body">
                            <h5 class="card-title">Tanah Lot, Bali</h5>
                            <p class="card-text">Tanah Lot adalah formasi batuan di lepas pantai pulau Bali, Indonesia. Ini adalah rumah bagi kuil ziarah Hindu
                                kuno Pura Tanah Lot, ikon wisata dan budaya yang populer untuk fotografi. Di sini ada dua pura yang terletak di atas batu besar. Satu 
                                terletak di atas bongkahan batu dan satunya terletak di atas tebing mirip dengan Pura Uluwatu. Pura Tanah Lot ini 
                                merupakan bagian dari Pura Dang Kahyangan
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item fw-bold">Rp. 5.000.000</li>
                            <li class="list-group-item"> <a href="login.php" class="btn btn-primary w-100">Pesan Tiket</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php    
    }
    ?>
   
   <?php
        if ( isset($_COOKIE['warna']) ) {
            $warna = $_COOKIE['warna'];
            if ($warna == 'light') {
               ?>
               <footer class="bg-primary bg-opacity-50 mt-5">
                   <?php
            }
            else if ($warna == 'dark') {
                ?>
               <footer class="bg-dark text-white mt-5">
                    <?php
            }
        }
        else {
            ?>
            <footer class="bg-primary bg-opacity-50 mt-5">
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