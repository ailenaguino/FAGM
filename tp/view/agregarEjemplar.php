{{> headerLogeado}}
<div class="container pt-5 my-3 border">
    <h2 class="text-center">Agregar Ejemplar</h2>

    <form method="POST" enctype="multipart/form-data" action="/ejemplar/validar">

        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" id="" placeholder="Olé" class="form-control" required>
        </div>

        <label>Categoría:</label>
        <select class="form-control mb-5" name="categoria">
            {{#categorias}}
            <option value="{{id}}">{{nombre}}</option>
            {{/categorias}}
        </select>

        {{#mensaje}}
        <h5 class="text-danger">{{mensaje}}</h5>
        {{/mensaje}}

        <div class="col clearfix">
            <input type="submit" value="Aceptar" class="btn btn-info float-right">
            <a class="btn btn-info" href="/usuario/contenidista">Atrás</a>
        </div>

    </form>
</div>

{{> footer}}