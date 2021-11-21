<?php
include 'Putri_koneksi.php';
if (isset($_POST['tambah_buku'])) {
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $deskripsi = $_POST['deskripsi'];
    $bahasa = $_POST['bahasa'];
    $tag = implode(",", $_POST['tag']);
    $gambar = $_FILES['gambar']['name'];
    $ekstensi =  array('png','jpg','jpeg','gif');
    $ukuran = $_FILES['gambar']['size'];
    $ext = pathinfo($gambar, PATHINFO_EXTENSION);
    if(!in_array($ext,$ekstensi) ) {
        header("location:Putri_tambah.php");
    }else{
        if($ukuran < 1044070){
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'image/'.$gambar);
            mysqli_query($koneksi, "INSERT INTO `buku_table`(`judul_buku`, `penulis_buku`, `tahun_terbit`, `deskripsi`, `gambar`, `tag`, `bahas`) VALUES ('$judul_buku','$penulis','$tahun_terbit','$deskripsi','$gambar','$tag','$bahasa')");
            header("location: Putri_home.php");
        }else{
            header("location: Putri_home.php");
        }
    }
}
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
            <a class="btn btn-info my-2 my-sm-0" href="Putri_TAMBAH.PHP">Tambah Buku</a>
        </div>
    </nav><br>
    <div class="container shadow p-3 mb-5 bg-white rounded">
        <h3 align="center">Tambah Data Buku</h3><br>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="Judul Buku">Judul Buku</label>
            <input type="text" name="judul_buku" id="judul_buku" class="form-control" placeholder="Contoh: Pemrograman Web Bersama EAD"><br>
            <label for="Penulis">Penulis</label>
            <input type="text" name="penulis" id="penulis" class="form-control" placeholder="Putri_1202194350"><br>
            <label for="Tahun Terbit">Tahun Terbit</label>
            <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control" placeholder="Contoh: 1990"><br>
            <label for="Deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">Contoh: Buku ini menjelaskan tentang ...</textarea><br>
            <div class="row">
                <div class="col-md-1">
                    <label for="Bahasa">Bahasa</label>
                </div>
                <div class="col-md-4">
                    <input type="radio" class="form_check" name="bahasa" id="bahasa" value="Indonesia">Indonesia
                    <input type="radio" class="form_check" name="bahasa" id="bahasa" value="Lainnya">Lainnya
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-1">
                    <label for="Tag">Tag</label>
                </div>
                <div class="col-md-11">
                    <input type="checkbox" class="form_check" name="tag[]" id="Pemrograman" value="Pemrograman"> Pemrograman            
                    <input type="checkbox" class="form_check" name="tag[]" id="Website" value="Website"> Website            
                    <input type="checkbox" class="form_check" name="tag[]" id="Java" value="Java"> Java            
                    <input type="checkbox" class="form_check" name="tag[]" id="OOP" value="OOP"> OOP            
                    <input type="checkbox" class="form_check" name="tag[]" id="MVC" value="MVC"> MVC            
                    <input type="checkbox" class="form_check" name="tag[]" id="Kalkulus" value="Kalkulus"> Kalkulus            
                    <input type="checkbox" class="form_check" name="tag[]" id="Lainnya" value="Lainnya"> Lainnya
                </div>
            </div><br>
            <label for="Gambar">Gambar</label>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>            
            <div class="text-center d-grid gap-2 col-6 mx-auto">
                <button type="submit" name="tambah_buku" class="btn btn-block btn-primary"> + Tambah</button>
            </div>
        </form>
    </div>
    <div class="bawah">
        <div class="text-center"><br><br>
            <img src="image/logo.png" alt="" width="200px"><br><br><br>
            <h4>Perpustakaan EAD</h4>
            <p>&copy; Putri_1202194350</p><br>
        </div>
    </div>
</body>