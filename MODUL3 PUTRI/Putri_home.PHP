<?php
include 'Putri_koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="image/LOGO.png" alt="" width="150px">
            </a>
            <a class="btn btn-info my-2 my-sm-0" href="Putri_tambah.PHP">Tambah Buku</a>
        </div>
    </nav><br>
    <div class="container">
        <div class="row">
        <?php
        $data = mysqli_query($koneksi,"SELECT*FROM buku_table");
        if (mysqli_num_rows($data)>0) {
            while ($kumpul=mysqli_fetch_array($data)) {?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="image/<?=$kumpul['gambar'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?=$kumpul['judul_buku'] ?></h5>
                            <p class="card-text"><?=$kumpul['deskripsi'] ?></p>
                            <a href="Putri_detail.PHP?id=<?=$kumpul['id_buku'] ?>" class="btn btn-primary">Tampilkan Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
        <?php } }else {?>
            </div>
            <div class="text-center">
                <h3>Belum Ada Buku</h3><hr>
                <p>Silahkan Menambahkan Buku</p>            
            </div>
        <?php }?>
    </div><br>
    <div class="bawah">
        <div class="text-center"><br><br>
            <img src="image/logo.png" alt="" width="200px"><br><br><br>
            <h4>Perpustakaan EAD</h4>
            <p>&copy; Putri_1202194350</p><br>
        </div>
    </div>
</body>
</html>