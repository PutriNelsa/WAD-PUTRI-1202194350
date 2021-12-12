<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <title> Data Dokumen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light justify-content-center">
        <div class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('home') }}">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="{{ route('vaccine.index') }}">VACCINE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active font-weight-bold" href="{{ route('patient.index') }}">PATIENT</a>
              </li>
        </div>
  </nav>
  <br>
  <br>
   
<div class="container">
  
  <center>
    <h1>List Vaccine  </h1>
  </center>
<br>
<br>
            <div class="row">
            @foreach ($vaccines as $no => $item)
            <div class="col-sm-4 my-3">
                <div class="card">
                    <img class="card-img-top" src="{{$item->image}}" alt="Card image cap" style="height:200px; object-fit:cover;">
                    <div class="card-body">
                      <h4 class="card-title">{{$item->name}}</h4>
                      <p class="card-text"><span class="text-muted">Rp {{$item->price}}</span></p>
                      <p class="card-text">{{$item->description}}</p>
                    </div>
                    <div class="card-footer">
                    <form action="{{route('patient.add')}}" method="POST">
                        @csrf
                      <input type="hidden" id="id" name="id" value="{{ $item->id }}">
                      <input type="hidden" id="name" name="name" value="{{ $item->name }}">
                      <button type="submit" class="btn btn-primary">Vaccine Now</button>
                    </form>

                    </div>
                  </div>
            </div>
            @endforeach
          </div>

</div>
  
<footer class="footer mt-auto py-3 fixed-bottom ">
    <div class="container" style="text-align: center">
      <p class="text-muted">
        <a href="#" class="text-reset" data-toggle="modal" data-target="#Modal">Made with 💙 Putri Nelsa - 1202194350</a>
      </p>
    </div>
  </footer>

<div class="modal fade" id="Modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Kesan Pesan Praktikum</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        Kesan : [Selama mengikuti pratikum saya merasa dalam pemabgaian tugas pendahuluannya mepet deadline dan selau sama dengan TP SISOP jadi,saya merasa setiap minggu harus pusing ngerjain dua TP SEKALIGUS]
        <br>
        <br>
        Pesan : [Jika ada pratikum selanjutnya lagi di lab EAD saya berharap dalam memeberikan TP jangan hanya dd 2 hari atau berbarengan denga TP lain dalam pengumpulannya]
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>