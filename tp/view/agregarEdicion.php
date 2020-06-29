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
            <input type="number" name="numero" min="1" placeholder="6" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Precio:</label>
            <input type="number" name="precio" min="0" placeholder="54.99" class="form-control"  step="0.01" required>
        </div>

        <label>Ejemplar:</label>
        <select class="form-control mb-3" name="ejemplar"> required
            {{#ejemplares}}
            <option value="{{id}}">{{nombre}}</option>
            {{/ejemplares}}
        </select>

        <label>Secciones:</label>
            {{#secciones}}
        <div>
            <input type="checkbox" name="seccion[]" value="{{id}}">  {{nombre}}
        </div>
            {{/secciones}}


        {{#mensaje}}
        <h5 class="text-danger">{{mensaje}}</h5>
        {{/mensaje}}

        <div class="col clearfix mt-5">
            <input type="submit" value="Aceptar" class="btn btn-info float-right">
            <a class="btn btn-info" href="/usuario/contenidista">Atrás</a>
        </div>

    </form>
</div>

{{> footer}}
