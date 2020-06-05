<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        nav button{margin: 0 4px 0 4px;}
        .container{width: 60%;}
        form .btn{margin: 1%;}
    </style>

</head>
<body>

    <?php
    include_once "nav-nologin.php";
    ?>

    <div class="container pt-5 my-3 border">
    <h2 class="text-center">Iniciar Sesión</h2>

    <form method="POST" enctype="multipart/form-data" action="">

        <div class="form-group">
        <label>Usuario:</label>
        <input type="text" name="" id="" placeholder="Ingrese su nombre de usuario" class="form-control">
        </div>

        <div class="form-group">
        <label>Contraseña:</label>
        <input type="password" name="" id="" placeholder="Ingrese su contraseña" class="form-control">
        </div>

        <div class="col clearfix">
            <input type="submit" value="Iniciar Sesión" class="btn btn-info float-right">
            <input type="reset" value="Cancelar" class="btn btn-info float-right">
        </div>

        <h6>No tengo cuenta, quiero <a href="registro.php">registrarme</a></h4>
    </form>
    </div>
    
</body>
</html>