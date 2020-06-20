{{> headerLogeado}}
<div class="container pt-5 my-3 border">
    <h2 class="text-center">Agregar Categoría</h2>

    <form method="POST" enctype="multipart/form-data" action="/categoria/validar">

        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" id="" placeholder="Diario" class="form-control" required>
        </div>

        {{#mensaje}}
        <h5 class="text-danger">{{mensaje}}</h5>
        {{/mensaje}}

        <div class="col clearfix">
            <input type="submit" value="Aceptar" class="btn btn-info float-right">
            <input type="reset" value="Cancelar" class="btn btn-info float-right">
        </div>

    </form>
</div>

{{> footer}}