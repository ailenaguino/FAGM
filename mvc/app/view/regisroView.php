{{> header}}
    <style>
        nav button{margin: 0 4px 0 4px;}
        .container{width: 60%;}
        form .btn{margin: 1%;}
    </style>



    <div class="container pt-5 my-3 border">
    <h2 class="text-center">Formulario de Registro</h2>

    <form method="POST" enctype="multipart/form-data" action="?module=usuario&action=procesarFormulario">

        <div class="form-group">
        <label>Usuario:</label>
        <input type="text" name="usuario" id="" placeholder="Cree su nombre de usuario" class="form-control">
        </div>

        <div class="form-group">
        <label>Nombre:</label>
        <input type="text" name="nombre" id="" placeholder="Cree su nombre real" class="form-control">
        </div>


        <div class="form-group">
        <label>Telefono:</label>
        <input type="tel" name="telefono" id="" placeholder="Telefono" class="form-control">
        </div>

        <div class="row">
            <div class="col">
            <label>Fecha de Nacimiento:</label>
            <input type="date" name="fecha" id="" class="form-control">
            </div>

            <div class="col">
            <label>Ubicación:</label>
            <input type="text" name="ubicacion" id="" placeholder="???????????¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿¿" class="form-control">
            </div>
        </div>

        <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" id="" placeholder="Ingrese su correo electrónico" class="form-control">
        </div>

        <div class="form-group">
        <label>Contraseña:</label>
        <input type="password" name="password" id="" placeholder="Cree una contraseña" class="form-control">
        </div>

        <div class="form-group">
        <label>Repita la contraseña:</label>
        <input type="password" name="password2" id="" placeholder="Repita su contraseña" class="form-control">
        </div>

        <div class="col clearfix">
            <input type="submit" value="Registrarse" class="btn btn-info float-right">
            <input type="reset" value="Cancelar" class="btn btn-info float-right">
        </div>

    </form>
    </div>

{{> footer}}