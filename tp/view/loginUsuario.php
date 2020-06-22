{{>header}}

    <div class="container pt-5 my-3 border">
    <h2 class="text-center">Iniciar Sesión</h2>

    <form method="POST" enctype="multipart/form-data" action="/usuario/login">

        <div class="form-group">
        <label>Usuario:</label>
        <input type="text" name="usuario" id="" placeholder="Ingrese su nombre de usuario" class="form-control">
        </div>

        <div class="form-group">
        <label>Contraseña:</label>
        <input type="password" name="password" id="" placeholder="Ingrese su contraseña" class="form-control">
        </div>

        <div class="col clearfix">
            <input type="submit" value="Iniciar Sesión" class="btn btn-info float-right">
        </div>

        <h6>No tengo cuenta, quiero <a href="/usuario/registro">registrarme</a></h6>
    </form>
    </div>

{{>footer}}