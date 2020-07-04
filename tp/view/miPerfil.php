{{> headerLogeado}}

    <div class="container my-4">
        {{#usuario}}
        <h1 class="display-4 d-inline px-3">{{nombre}}</h1>
        {{/usuario}}

        <a href="editarPerfil" class="float-right">
            <button type="button" class="btn btn-primary btn-lg active">Editar Perfil</button></a>

        <div class="border border-info rounded mt-3 p-3">
        <div class="row">
            <div class="col-4 my-4 row">
                <div class="col">
                <img src="/view/assets/user.png" style="width:80px;" class="d-inline">
                </div>
                <div class="col-8">
                {{#usuario}}
                <h4>Nombre de Usuario</h4>
                <p class="text-muted p-1" style="font-size:25px;">{{nombre_usuario}}</p>
                {{/usuario}}
                </div>
            </div>

            <div class="col my-4 row">
                <div class="col-3">
                    <img src="/view/assets/email.png" style="width:80px;" class="d-inline">
                </div>
                <div class="col-8">
                {{#usuario}}
                <h4>Email</h4>
                <p class="text-muted p-1" style="font-size:25px;">{{email}}</p>
                {{/usuario}}
                </div>
            </div>

            <div class="col-4 my-4 row">
                <div class="col">
                    <img src="/view/assets/book.png" style="width:80px;" class="d-inline">
                </div>
                <div class="col-8">
                {{#usuario}}
                <h4>Telefono</h4>
                <p class="text-muted p-1" style="font-size:25px;">{{telefono}}</p>
                {{/usuario}}
                </div>
            </div>
        </div>

        <hr/>
        <div class="row">
            <div class="col my-4 mx-5 row">
                <div class="col">
                    <img src="/view/assets/calendar.png" style="width:80px;" class="d-inline">
                </div>
                <div class="col-8">
                {{#usuario}}
                <h4>Fecha de Nacimiento</h4>
                <p class="text-muted p-1" style="font-size:25px;">{{fecha_nacimiento}}</p>
                {{/usuario}}
                </div>
            </div>

            <div class="col my-4 mx-5 row">
                <div class="col">
                    <img src="/view/assets/location.png" style="width:80px;" class="d-inline">
                </div>
                <div class="col-8">
                {{#usuario}}
                <h4>Ubicación</h4>
                <p class="text-muted p-1" style="font-size:25px;">{{ubicacion}}</p>
                {{/usuario}}
                </div>
            </div>
        </div>
        </div>
    </div>

<hr/>

<a href="index" class="my-5">
    <button type="button" class="btn btn-outline-primary btn-lg">Volver</button></a>

{{> footer}}
