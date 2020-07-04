{{> headerLogeado}}
<div class="container pt-2 my-3 border">
    <h2 class="display-4 mb-5">Editar Perfil</h2>

    <div class="row">
        <div class="col-md">
        <form method="POST" enctype="multipart/form-data" action="/usuario/editarNombre">
            <div class="form-group">
                <label>Nombre Real:</label>
                {{#usuario}}
                <input type="text" name="nombre" id="" placeholder="{{nombre}}" class="form-control" required>
                {{/usuario}}
            </div>

            {{#mensajeNombre}}
            <h5 class="text-danger">{{mensajeNombre}}</h5>
            {{/mensajeNombre}}

                <input type="submit" value="Editar" class="btn btn-info btn-sm">
        </form>
        </div>

        <div class="col-md">
        <form method="POST" enctype="multipart/form-data" action="/usuario/editarUsername">
            <div class="form-group">
                <label>Nombre de Usuario:</label>
                {{#usuario}}
                <input type="text" name="username" id="" placeholder="{{nombre_usuario}}" class="form-control" required>
                {{/usuario}}
            </div>

            {{#mensajeUsername}}
            <h5 class="text-danger">{{mensajeUsername}}</h5>
            {{/mensajeUsername}}

            <input type="submit" value="Editar" class="btn btn-info btn-sm">
        </form>
        </div>

        <div class="col-md">
            <form method="POST" enctype="multipart/form-data" action="/usuario/editarEmail">
                <div class="form-group">
                    <label>Email:</label>
                    {{#usuario}}
                    <input type="email" name="email" id="" placeholder="{{email}}" class="form-control" required>
                    {{/usuario}}
                </div>

                {{#mensajeEmail}}
                <h5 class="text-danger">{{mensajeEmail}}</h5>
                {{/mensajeEmail}}

                <input type="submit" value="Editar" class="btn btn-info btn-sm">
            </form>
        </div>
    </div>

    <hr/>

    <div class="row">
        <div class="col-md">
            <form method="POST" enctype="multipart/form-data" action="/usuario/editarUbicacion">
                <div class="form-group">
                    <label>Ubicacion:</label>
                    {{#usuario}}
                    <input type="text" name="ubicacion" id="" placeholder="{{ubicacion}}" class="form-control" required>
                    {{/usuario}}
                </div>

                {{#mensajeUbicacion}}
                <h5 class="text-danger">{{mensajeUbicacion}}</h5>
                {{/mensajeUbicacion}}

                <input type="submit" value="Editar" class="btn btn-info btn-sm">
            </form>
        </div>

        <div class="col-md">
            <form method="POST" enctype="multipart/form-data" action="/usuario/editarTelefono">
                <div class="form-group">
                    <label>Telefono:</label>
                    {{#usuario}}
                    <input type="text" name="telefono" id="" placeholder="{{telefono}}" class="form-control" required>
                    {{/usuario}}
                </div>

                {{#mensajeTelefono}}
                <h5 class="text-danger">{{mensajeTelefono}}</h5>
                {{/mensajeTelefono}}

                <input type="submit" value="Editar" class="btn btn-info btn-sm">
            </form>
        </div>

    </div>

    <hr/>

    <div class="mx-5 my-3">
        <p style="font-size: 40px;">Cambiar Contraseña</p>
        <form method="POST" enctype="multipart/form-data" action="/usuario/editarContraseña">
            <div class="form-group">
                <label>Contraseña Antigua:</label>
                {{#usuario}}
                <input type="password" name="passVieja" id="" class="form-control" required>
                {{/usuario}}
            </div>

            <div class="form-group">
                <label>Contraseña Nueva:</label>
                {{#usuario}}
                <input type="password" name="pass1" id="" class="form-control" required>
                {{/usuario}}
            </div>

            <div class="form-group">
                <label>Repita la nueva contraseña:</label>
                {{#usuario}}
                <input type="password" name="pass2" id="" class="form-control" required>
                {{/usuario}}
            </div>

            {{#mensajePass}}
            <h5 class="text-danger">{{mensajePass}}</h5>
            {{/mensajePass}}

            <input type="submit" value="Editar" class="btn btn-info">
        </form>
    </div>
</div>

<hr/>

<a href="miPerfil" class="my-5">
    <button type="button" class="btn btn-outline-primary btn-lg">Volver</button></a>

{{> footer}}