{{> headerLogeado}}
<form action="/seccion/validarEdicion" method="POST" enctype="multipart/form-data" class="my-5">
    <div class="row mb-4">
        <div class="col">
            <label>ID</label>
            {{#seccion}}
            <input class="form-control" type="text" name="id" value="{{id}}" placeholder="{{id}}" readonly>
            {{/seccion}}
        </div>
        <div class="col">
            <label>Nombre viejo</label>
            {{#seccion}}
            <input class="form-control" type="text" name="nombreViejo" value="{{nombre}}" placeholder="{{nombre}}" readonly>
            {{/seccion}}
        </div>
    </div>

    <hr/>

    <div class="form-group mb-4">
        <label for="nn">Nuevo nombre</label>
        <input type="text" class="form-control" id="nn" name="nombre"
               placeholder="El nombre debe ser distinto al anterior" required>
    </div>

    {{#mensaje}}
    <h5 class="text-danger">{{mensaje}}</h5>
    {{/mensaje}}

    <input type="submit" value="Aceptar" class="btn btn-info">
    <a class="btn btn-info" href="/usuario/contenidista">Atrás</a>
</form>

{{> footer}}