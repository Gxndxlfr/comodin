<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria DBD | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    body {
      background: #6800ad;
      background: linear-gradient(to right, #8dd635, #052233, #054f77)
    }
  </style>
</head>
<body>
  @if(session('id_role_logeado')==1)
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Libreria DBD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/agregarLibro">Agregar Libro</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/">Cerrar sesión</a>
      </li>
    </ul>
  </div>
</nav>
  @endif
  @if(session('id_role_logeado')==2)
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Libreria DBD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/">Cerrar sesión</a>
      </li>
    </ul>
  </div>
</nav>
  @endif
  <div class="container">
    <h4 class="mb-5 text-center p-5 text-white">Libros</h4>
    <div class="row text-center mb-4">
        @foreach($books as $b)
        <div class="col-4 d-flex justify-content-center mb-5">
            <div class="card" style="width: 18rem;">
                <img src="https://image.freepik.com/free-psd/open-book-mockup_1150-37587.jpg"
                class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{$b->name}}</h5>
                    <p class="card-text">{{$b->autor}}</p>
                    <p class="card-text">{{$b->fecha_publicacion}}</p>
                    <a href="{{$b->link_descarga}}" class="btn btn-primary">Link Descarga</a>
                </div>
            </div>
        </div>  
        @endforeach
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
    


</body>
</html>