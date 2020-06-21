{{>header}}

<div class="container my-5">
    <h2>Elegir edición para la noticia</h2>
    <form method="POST" enctype="multipart/form-data" action="/noticia/mostrarSecciones">

        <select class="form-control my-3" name="edicion">
            {{#sesion}}
            <option value="{{id}}">{{nombre}} | Numero: {{numero}} </option>
            {{/sesion}}
        </select>
        <button class="btn btn-outline-info my-3">Confirmar edicion</button>
        <a href="/noticia/index" class="btn btn-outline-danger my-3 ml-3">Volver</a>
    </form>


</div>


{{>footer}}
