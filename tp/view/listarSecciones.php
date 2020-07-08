{{> headerLogeado}}
<table class="table my-5">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Estado</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    <tbody>
    {{#secciones}}
    <tr>
        <td>{{nombre}}</td>
        {{#estado}}
            <td>activo</td>
        {{/estado}}
        {{^estado}}
        <td>inactivo</td>
            {{/estado}}
        <td>
            <form action="/seccion/editar" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{id}}" >
                <button type="submit" class="btn btn-outline-dark btn-block">Editar</button>
            </form>
        </td>
        
    </tr>
    {{/secciones}}
    </tbody>
</table>
<h5>Agregar otra seccion 
    <button class="btn btn-outline-dark" onclick="agregar()">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
        </svg>
    </button>
</h5>
{{#mensaje}}
        <h5 class="text-danger">{{mensaje}}</h5>
{{/mensaje}}
<form method="POST" id="agregar" enctype="multipart/form-data" action="/seccion/validar" style="display:none;">

        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" id="" placeholder="Deportes" class="form-control" required>
        </div>

        <div class="col clearfix">
            <input type="submit" value="Aceptar" class="btn btn-info float-right">
            <a class="btn btn-info" href="/usuario/contenidista">Atrás</a>
        </div>

</form>

{{> footer}}
<script>
    function agregar(){
        document.getElementById('agregar').style="display:block;";
    }
</script>