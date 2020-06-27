{{> headerLogeado}}
<form action="/ejemplar/validarEdicion" method="POST" enctype="multipart/form-data" class="my-5">
    <div class="row mb-4">
        <div class="col">
            <label>ID</label>
            {{#ejemplar}}
            <input class="form-control" type="text" name="id" value="{{id}}" placeholder="{{id}}" readonly>
            {{/ejemplar}}
        </div>
        <div class="col">
            <label>Nombre viejo</label>
            {{#ejemplar}}
            <input class="form-control" type="text" placeholder="{{nombre}}" readonly>
            {{/ejemplar}}
        </div>
    </div>
    <div class="row mb-4">
        <div class="col">
            <label>Precio viejo</label>
            {{#ejemplar}}
            <input class="form-control" type="text" placeholder="${{precio}}" readonly>
            {{/ejemplar}}
        </div>
        <div class="col">
            <label>Categoría vieja</label>
            {{#ejemplar}}
            <input class="form-control" type="text" placeholder="{{id_categoria}}" readonly>
            {{/ejemplar}}
        </div>
    </div>

    <hr/>

    <div class="form-group mb-4">
        <label>Nuevo nombre</label>
        {{#ejemplar}}
        <input type="text" class="form-control" name="nombre" value="{{nombre}}" required>
        {{/ejemplar}}
    </div>

    <div class="form-group">
        <label>Precio de suscripción:</label>
        {{#ejemplar}}
        <input type="number" name="precio" min="0" value="{{precio}}" class="form-control"  step="0.01" required>
        {{/ejemplar}}
    </div>

    <label>Categoría:</label>
    <select class="form-control mb-5" name="categoria" required>
        {{#categorias}}
        <option value="{{id}}">{{nombre}}</option>
        {{/categorias}}
    </select>

    {{#mensaje}}
    <h5 class="text-danger">{{mensaje}}</h5>
    {{/mensaje}}

    <input type="submit" value="Aceptar" class="btn btn-info">
    <a class="btn btn-info" href="/usuario/contenidista">Atrás</a>
</form>

{{> footer}}