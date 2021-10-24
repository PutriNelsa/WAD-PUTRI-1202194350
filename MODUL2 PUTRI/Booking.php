<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venue Booking</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
        .nav-link{
            color: white;
        }
        h5{
            text-align: center;
        }
        .welkam{
            color: white;
        }
        .list-group-item{
            text-align: center;
            color: green;
            font-weight: bold;
        }
        .no{
            color: red;
        }
        .card-link{
            display: flex;
            justify-content: center;
        }
        .image{
            width: 300px;
            margin: 50% 50px;
        }
        input, select{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <ul class="navbar navbar-dark bg-dark nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="venue.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="booking.php">Booking</a>
        </li>
    </ul><br>
    <div class="container">
        <ul class="col-md-12 navbar-dark bg-dark nav justify-content-center">
            <li class="nav-item">
                <p class="welkam">Reserve your venue, now!</p>
            </li>
        </ul><br>
        <div class="row">
            <div class="col-md-12 card">
                <form action="myBooking.php" method="post">
                    <div class="row">
                        <div class="col-md-4">
                        <?php
                        if (!empty($_GET['id'])) {
                            $id = $_GET['id'];
                            if ($id==1) {
                                echo '<img class="image" src="hall1.jpg" alt="Image hall">';
                                echo '<input type="number" name="harga" value="2000" hidden readonly>';
                            }elseif ($id==2) {
                                echo '<img class="image" src="hall2.jpg" alt="Image hall">';
                                echo '<input type="number" name="harga" value="1000" hidden readonly>';
                            }elseif ($id==3) {
                                echo '<img class="image" src="hall3.jpg" alt="Image hall">';
                                echo '<input type="number" name="harga" value="500" hidden readonly>';
                            }
                        }
                        
                        else{
                            echo '<img class="image" src="hall.jpg" alt="Image hall">';
                        }
                        ?>
                        </div>
                        <div class="col-md-8"><br>
                            <div class="col-md-12">
                                <label for="Name">Name</label>
                                <input type="text" name="nama" readonly value="putri_1202194350" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="Event">Event Date</label>
                                <input type="date" name="event_date" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="Start">Start</label>
                                <input type="time" name="start" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="Duration">Duration (Hours)</label>
                                <input type="number" name="duration" min="1" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="Type">Building Type</label>
                                <select name="type" id="type" class="form-control">
                                <?php
                                 if (!empty($_GET['id'])) {
                                    $id = $_GET['id'];
                                    if ($id==1){
                                        echo '<option selected>Nusantara Hall</option>';
                                    }elseif ($id==2) {
                                        echo '<option selected>Garuda Hall</option>';
                                    }elseif ($id==3) {
                                        echo '<option selected>Gedung Serba Guna</option>';
                                    }
                                } else {
                                    echo '<option value="Nusantara Hall">Nusantara Hall</option>';
                                    echo '<option value="Garuda Hall">Garuda Hall</option>';
                                    echo '<option value="Gedung Serba Guna">Gedung Serba Guna</option>';
                                }
                                ?>                                                                    
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="no_phone">Phone Number</label>
                                <input type="number" name="no_phone" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label for="service">Add Service(s)</label><br>
                                <input type="checkbox" name="service[]" value="Catering"> Catering/$700 <br>
                                <input type="checkbox" name="service[]" value="Decoration"> Decoration/$450 <br>
                                <input type="checkbox" name="service[]" value="Sound System"> Sound Sytem/$250
                            </div><br>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-info">Book</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>