{{> headerLogeado}}
<form action="/edicion/validarEdicion" method="POST" enctype="multipart/form-data" class="my-5">
    <div class="row mb-4">
        <div class="col">
            <label>ID</label>
            {{#edicion}}
            <input class="form-control" type="text" name="id" value="{{id}}" placeholder="{{id}}" readonly>
            {{/edicion}}
        </div>
        <div class="col">
            <label>Nombre viejo</label>
            {{#edicion}}
            <input class="form-control" type="text" placeholder="{{nombre}}" readonly>
            {{/edicion}}
        </div>
        <div class="col">
            <label>Numero viejo</label>
            {{#edicion}}
            <input class="form-control" type="text" placeholder="{{numero}}" readonly>
            {{/edicion}}
        </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <label>Precio viejo</label>
            {{#edicion}}
            <input class="form-control" type="text" placeholder="${{precio}}" readonly>
            {{/edicion}}
        </div>
        <div class="col">
            <label>Ejemplar viejo</label>
            {{#edicion}}
            <input class="form-control" type="text" placeholder="{{id_ejemplar}}" readonly>
            {{/edicion}}
        </div>
    </div>

    <hr/>

    <div class="form-group mb-4">
        <label>Nuevo nombre</label>
        {{#edicion}}
        <input type="text" class="form-control" name="nombre" value="{{nombre}}" required>
        {{/edicion}}
    </div>

    <div class="form-group">
        <label>Numero:</label>
        {{#edicion}}
        <input type="number" name="numero" min="1" value="{{numero}}" class="form-control" required>
        {{/edicion}}
    </div>

    <div class="form-group">
        <label>Precio:</label>
        {{#edicion}}
        <input type="number" name="precio" min="0" value="{{precio}}" class="form-control"  step="0.01" required>
        {{/edicion}}
    </div>

    <label>Ejemplar:</label>
    <select class="form-control mb-3" name="ejemplar" required>
        {{#ejemplares}}
        <option value="{{id}}">{{nombre}}</option>
        {{/ejemplares}}
    </select>

    <div class="mb-5">
    <label>Secciones:</label>
    {{#secciones}}
    <div>
        <input type="checkbox" name="seccion[]" value="{{id}}">  {{nombre}}
    </div>
    {{/secciones}}
    </div>


    {{#mensaje}}
    <h5 class="text-danger">{{mensaje}}</h5>
    {{/mensaje}}

    <input type="submit" value="Aceptar" class="btn btn-info">
    <a class="btn btn-info" href="/usuario/contenidista">Atrás</a>
</form>

{{> footer}}