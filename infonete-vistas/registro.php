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
    <h2 class="text-center">Formulario de Registro</h2>

    <form method="POST" enctype="multipart/form-data" action="">

        <div class="form-group">
        <label>Usuario:</label>
        <input type="text" name="" id="" placeholder="Cree su nombre de usuario" class="form-control">
        </div>

        <div class="form-group">
        <label>Nombre:</label>
        <input type="text" name="" id="" placeholder="Cree su nombre real" class="form-control">
        </div>

        
        <div class="form-group">
        <label>Telefono:</label>
        <input type="tel" name="" id="" placeholder="Cree su nombre de usuario" class="form-control">
        </div>

        <div class="row">
            <div class="col">
            <label>Fecha de Nacimiento:</label>
            <input type="date" name="" id="" class="form-control">
            </div>

            <div class="col">
            <label>Ubicación:</label>
            <input type="text" name="" id="" placeholder="???????????¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿" class="form-control">
            </div>
        </div>

        <div class="form-group">
        <label>Email:</label>
        <input type="email" name="" id="" placeholder="Ingrese su correo electrónico" class="form-control">
        </div>

        <div class="form-group">
        <label>Contraseña:</label>
        <input type="password" name="" id="" placeholder="Cree una contraseña" class="form-control">
        </div>

        <div class="form-group">
        <label>Repita la contraseña:</label>
        <input type="password" name="" id="" placeholder="Repita su contraseña" class="form-control">
        </div>

        <div class="col clearfix">
            <input type="submit" value="Registrarse" class="btn btn-info float-right">
            <input type="reset" value="Cancelar" class="btn btn-info float-right">
        </div>
    
    </form>
    </div>
    
</body>
</html>