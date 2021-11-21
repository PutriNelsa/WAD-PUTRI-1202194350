<?php
include 'Putri_koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi,"SELECT*FROM buku_table WHERE id_buku='$id'");
$kumpulan = mysqli_fetch_array($data);
$id_buku = $kumpulan['id_buku'];
$judul_buku = $kumpulan['judul_buku'];
$penulis_buku = $kumpulan['penulis_buku'];
$tahun_terbit = $kumpulan['tahun_terbit'];
$deskripsi = $kumpulan['deskripsi'];
$gambar = $kumpulan['gambar'];
$tag = explode(',', $kumpulan['tag']);
$bahas = $kumpulan['bahas'];
if (isset($_POST['edit_buku'])) {
    $id_buku = $_POST['id_buku'];
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
            mysqli_query($koneksi, "UPDATE buku_table SET judul_buku='$judul_buku',penulis_buku='$penulis',tahun_terbit='$tahun_terbit',deskripsi='$deskripsi',gambar='$gambar',tag='$tag',bahas='$bahasa' WHERE id_buku='$id_buku'");
            header("location:Putri_home.php");
        }else{
            header("location:Putri_home.php");
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
        <div class="text-center">
            <h4>Detail Buku</h4><br>
            <img src="image/<?=$gambar ?>" alt="" width="400px"><br><br><hr>
        </div>
        <label for="Judul Buku">Judul Buku: </label><br>
        <p><?= $judul_buku; ?></p>
        <label for="Penulis">Penulis</label><br>
        <p><?= $penulis_buku; ?></p>
        <label for="Tahun Terbit">Tahun Terbit</label><br>
        <p><?= $tahun_terbit; ?></p>
        <label for="Deskripsi">Deskripsi</label><br>
        <p><?= $deskripsi; ?></p>
        <label for="Bahasa">Bahasa</label><br>
        <p><?= $bahas; ?></p>
        <label for="Tag">Tag</label>
        <p><?php foreach ($tag as $value) {
            echo $value, ". ";} ?></p><br>
        <div class="row">
            <div class="d-grid gap-2 col-6">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                    Sunting
                </button>
            </div>
            <div class="d-grid gap-2 col-6">
                <a href="Putri_delete.php?id=<?= $id_buku;?>" class="btn btn-danger">
                    Delete
                </a>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Sunting</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <label for="Judul Buku">Judul Buku</label>
                            <input value="<?= $id_buku; ?>" type="hidden" name="id_buku" id="id_buku" class="form-control"><br>
                            <input value="<?= $judul_buku; ?>" type="text" name="judul_buku" id="judul_buku" class="form-control"><br>
                            <label for="Penulis">Penulis</label>
                            <input value="<?= $penulis_buku; ?>" type="text" name="penulis" id="penulis" class="form-control"><br>
                            <label for="Tahun Terbit">Tahun Terbit</label>
                            <input value="<?= $tahun_terbit; ?>" type="number" name="tahun_terbit" id="tahun_terbit" class="form-control"><br>
                            <label for="Deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"><?= $deskripsi; ?></textarea><br>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="Bahasa">Bahasa</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="radio" class="form_check" name="bahasa" id="bahasa" <?php if ($bahas=="Indonesia") echo "checked";?> value="Indonesia">Indonesia
                                    <input type="radio" class="form_check" name="bahasa" id="bahasa" <?php if ($bahas=="Lainnya") echo "checked";?> value="Lainnya">Lainnya
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-1">
                                    <label for="Tag">Tag</label>
                                </div>
                                <div class="col-md-11">
                                    <input type="checkbox" class="form_check" name="tag[]" id="Pemrograman" <?php if (in_array("Pemrograman", $tag)) echo "checked";?> value="Pemrograman"> Pemrograman            
                                    <input type="checkbox" class="form_check" name="tag[]" id="Website" <?php if (in_array("Website", $tag)) echo "checked";?> value="Website"> Website            
                                    <input type="checkbox" class="form_check" name="tag[]" id="Java" <?php if (in_array("Java", $tag)) echo "checked";?> value="Java"> Java            
                                    <input type="checkbox" class="form_check" name="tag[]" id="OOP" <?php if (in_array("OOP", $tag)) echo "checked";?> value="OOP"> OOP            
                                    <input type="checkbox" class="form_check" name="tag[]" id="MVC" <?php if (in_array("MVC", $tag)) echo "checked";?> value="MVC"> MVC            
                                    <input type="checkbox" class="form_check" name="tag[]" id="Kalkulus" <?php if (in_array("Kalkulus", $tag)) echo "checked";?> value="Kalkulus"> Kalkulus            
                                    <input type="checkbox" class="form_check" name="tag[]" id="Lainnya" <?php if (in_array("Lainnya", $tag)) echo "checked";?> value="Lainnya"> Lainnya
                                </div>
                            </div><br>
                            <label for="Gambar">Gambar</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="gambar" name="gambar">
                            </div> 
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" name="edit_buku" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <div class="bawah">
        <div class="text-center"><br><br>
            <img src="image/logo.png" alt="" width="200px"><br><br><br>
            <h4>Perpustakaan EAD</h4>
            <p>&copy; Putri_1202194350</p><br>
        </div>
    </div>
</body>
</html>