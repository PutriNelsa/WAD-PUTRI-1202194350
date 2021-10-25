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
            footer {
                position: fixed;
                padding: 10px 10px 0px 10px;
                bottom: 30px;
                width: 100%;
                /* Height of the footer*/ 
                height: 40px;
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
            <h4 align="center">Thank you <?= $_POST['name']?> for Reserving</h4>
            <h6 align="center">Please double check your reservation details</h6>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Booking Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Check-in</th>
                    <th scope="col">Check-out</th>
                    <th scope="col">Building Type</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Service</th>
                    <th scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"><?php echo rand(0, 99999999);?></th>
                        <td><?= $_POST['nama']?></td>
                        <td><p><?php echo date("Y-m-d  H:i:s", strtotime("+".$_POST['event_date'].''.$_POST['start']))?></p></td>
                        <td>
                        <?php
                        echo date("Y-m-d  H:i:s", strtotime("+".$_POST['event_date'].' '.$_POST['duration'].' hour'.$_POST['start']));
                        ?>
                        </td>
                        <td><?php echo $_POST['type']?></td>
                        <td><?= $_POST['no_phone']?></td>
                        <td>
                            <ul>
                                <?php 
                                if (!empty($_POST['service'])) {
                                    foreach($_POST['service'] as $service ){?>
                                <li><?= $service; ?></li>
                                <?php }}else {
                                    echo 'No Service';
                                }?>
                            </ul>
                        </td>
                    <td>
                        <?php 
                        $total = $_POST['duration']*$_POST['harga'];
                        if (!empty($_POST['service'])) {
                            foreach($_POST['service'] as $service ){
                                if ($service=="Catering") {
                                    $total = $total+700;                
                                } elseif ($service=="Decoration") {
                                    $total = $total+450;                
                                }elseif ($service=="Sound System") {
                                    $total = $total+250;                
                                }              
                            }  
                        }      
                        echo '$'.$total;
                        ?>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div><br>
        <footer>
            <ul class="navbar navbar-light bg-light nav justify-content-center">
                <li class="nav-item">
                    <p class="nav-link active" style="color: black;" href="#">Created by putri_1202194350</p>
                </li>
            </ul>
        </footer>
    </body>
    </html>