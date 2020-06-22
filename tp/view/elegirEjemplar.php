{{> headerLogeado}}

<div class="container my-5">
    <h2>Elegir ejemplar para la noticia</h2>
    <form method="POST" enctype="multipart/form-data" action="/noticia/mostrarEdiciones">
        <select  class="form-control my-3" name="ejemplar">
            {{#sesion}}
            <option value="{{id}}">{{nombre}}</option>
            {{/sesion}}
        </select>

        <button class="btn btn-outline-info my-3">Confirmar ejemplar</button>
        <a href="/usuario/contenidista" class="btn btn-outline-danger my-3 ml-3">Volver</a>
    </form>


</div>


{{>footer}}
