<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis Productos</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        .container{width: 80%;}
    </style>
</head>
<body>

    <?php
    include_once "nav-login.php";
    ?>

    <section>
    <div class="container p-5 my-3 border">

    <h2 class="text-center mb-5">MIS PRODUCTOS</h2>

        <form>
            <div class="row">
              <input type="text" id="" placeholder="Buscar" class="form-control col-sm-10">
              <input type="submit" class="btn btn-info col ml-5" value="Buscar">
            </div>
        </form>

    <div class="card-deck mt-4">

            <div class="card mb-3" style="max-width: 540px;">
                  <div class="row no-gutters">
                    <div class="col-md-4">
                      <a href="detalleRevista.php"> <img src="img/portada_revista.jpg" class="card-img" alt="..."></a>
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Revista</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                  </div>
                </div>
    </div>

    </div>
    </section>
</body>
</html>