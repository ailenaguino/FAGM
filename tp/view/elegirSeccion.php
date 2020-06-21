{{>header}}

<div class="container my-5">
    <h2>Elegir seccion para la noticia</h2>
    <form method="POST" enctype="multipart/form-data" action="/noticia/crearNoticia">
        <select class="form-control my-3" name="seccion">
            {{#sesion}}
            <option value="{{id_seccion}}">{{nombre}} {{id_seccion}}</option>
            {{/sesion}}
        </select>

        <button class="btn btn-outline-info my-3">Confirmar seccion</button>
        <a href="/noticia/index" class="btn btn-outline-danger my-3 ml-3">Volver</a>
    </form>


</div>


{{>footer}}
