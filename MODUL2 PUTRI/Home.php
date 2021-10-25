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
            .card{
                width: 22rem;
                margin: 6px;
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
            footer {
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
        <h5>WELCOME TO ESD VENUE RESERVATION</h5><br>
        <div class="container">
            <ul class="col-md-12 navbar-dark bg-dark nav justify-content-center">
                <li class="nav-item">
                    <p class="welkam">Find your best deal for your event, here!</p>
                </li>
            </ul><br>
            <div class="container">
                <div class="row">
                    <div class="card">
                        <img class="card-img-top" src="hall.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h6>Nusantara Hall</h6>
                            <p class="card-text">$2000 / hour <br>5000 Capacities</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Free Parking</li>
                            <li class="list-group-item">Full AC</li>
                            <li class="list-group-item">Cleaning Service</li>
                            <li class="list-group-item">Covid-19 Health Protocol</li>
                        </ul>
                        <div class="card-body text-center">
                            <a href="booking.php?id=1" class="btn btn-info">Book Now</a>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="hall2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h6>Garuda Hall</h6>
                            <p class="card-text">$1000 / hour <br>2000 Capacities</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Free Parking</li>
                            <li class="list-group-item">Full AC</li>
                            <li class="no list-group-item">No Cleaning Service</li>
                            <li class="list-group-item">Covid-19 Health Protocol</li>
                        </ul>
                        <div class="card-body text-center">
                            <a href="booking.php?id=2" class="btn btn-info">Book Now</a>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="hall3.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h6>Gedung Serba Guna</h6>
                            <p class="card-text">$500 / hour <br>500 Capacities</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="no list-group-item">No Free Parking</li>
                            <li class="no list-group-item">No Full AC</li>
                            <li class="no list-group-item">No Cleaning Service</li>
                            <li class="list-group-item">Covid-19 Health Protocol</li>
                        </ul>
                        <div class="card-body text-center">
                            <a href="booking.php?id=3" class="btn btn-info">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
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