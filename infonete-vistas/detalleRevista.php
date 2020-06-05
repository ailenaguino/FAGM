<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle de Revista</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        .container{width: 60%;}
    </style>
</head>
<body>

    <?php
    include_once "nav-login.php";
    ?>
    <div class="container p-4 my-3 border">
        <h3 class="text-center">DETALLE DE REVISTA</h3>
        <div class="row pt-4">
            <div class="col-sm">
            <div class="card border-light mb-3">
                <div class="card-header">Revista</div>
                <div class="card-body">
                    <h5 class="card-title">Nombre</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-sm">
        <img src="img/portada_revista.jpg" width="200px" class="mx-auto d-block">
        </div>
    </div>

    <div class="row">
        <div class="col-sm">
        <h6 class="pl-4">Buscar número de Ejemplar</h6>
            <form class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
              <input type="text" class="form-control" id="" placeholder="nro de ejemplar">
            </div>
            <button type="submit" class="btn btn-info mb-2">Buscar</button>
          </form>

          <div class="mt-3">
          <label class="pl-4">Precio</label> 
          <button class="btn btn-info mb-2 ml-2">Comprar</button>
        </div>

        </div>

        <div class="col-sm pt-4 text-center">
                <h6 class="text-center">Precio</h6> 
                <button class="btn btn-info mt-3">Suscribirme a esta revista</button>
        </div>
    </div>
    </div>

</body>
</html>