{{> headerLogeado}}
<div class="container pt-5 my-3 border">
    <h2 class="text-center">Agregar Edicion</h2>

    <form method="POST" enctype="multipart/form-data" action="/edicion/validar">

        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" id="" placeholder="Primavera" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Numero:</label>
            <input type="number" name="numero" id="" placeholder="6" class="form-control" required>
        </div>

        <label>Ejemplar:</label>
        <select class="form-control mb-5" name="ejemplar">
            {{#ejemplares}}
            <option value="{{id}}">{{nombre}}</option>
            {{/ejemplares}}
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
