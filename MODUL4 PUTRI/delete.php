    <?php
    include 'koneksi.php';
    session_start();

    if(isset($_SESSION['status'])){

        $id = $_GET['id'];
        mysqli_query($koneksi, "delete from bookings where id='$id'");
        header("location:booking.php?alert=delete");
        
    }

    ?>