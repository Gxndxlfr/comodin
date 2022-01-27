<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria DBD ! agregar usuario</title>
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
        <a class="nav-link" href="">Agregar Libro</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/">Cerrar sesión</a>
      </li>
    </ul>
  </div>
</nav>
  <section>
    <div class="container w-75 bg-black mt-5 rounded shadow">
      <div class="row">
        <div class="col">        
        <h4 class="mb-3 text-white">Formulario Nuevo Libro</h4>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{route('agregarLibro')}}" >
          <div class="mb-3">
              <label for="nombreLibro" class="form-label text-white">Nombre Libro</label>
              <input type="string" id="name" name="name"  class="form-control" aria-describedby="emailHelp">                 
          </div>
          <div class="mb-3">
              <label for="autor" class="form-label text-white">Nombre Autor</label>
              <input type="string" class="form-control" name="autor" id="autor" >
          </div>
          <div class="mb-3">
              <label for="fechaPublicacion" class="form-label text-white">Fecha de publicación</label>
              <input type="date" class="form-control" name="fecha_publicacion" id="fecha_publicacion" >
          </div>
          <div class="mb-3">
              <label for="link_descarga" class="form-label text-white">Link de descarga</label>
              <input type="string" class="form-control" name="link_descarga" id="link_descarga" >
          </div>
          <button type="submit" class="btn btn-primary">Agregar Libro</button>
        </form>


        </div>
      </div>
     </div>
  </section>
 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>