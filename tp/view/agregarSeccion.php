{{> headerLogeado}}
<div class="container pt-5 my-3 border">
    <h2 class="text-center">Agregar Seccion</h2>

    <form method="POST" enctype="multipart/form-data" action="/seccion/validar">

        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" id="" placeholder="Deportes" class="form-control" required>
        </div>

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