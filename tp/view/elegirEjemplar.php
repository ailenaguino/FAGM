{{>header}}

<div class="container my-5">
    <h2>Elegir ejemplar para la noticia</h2>
    <form method="POST" enctype="multipart/form-data" action="/noticia/mostrarEdiciones">
        <select class="my-5" name="ejemplar">
            {{#sesion}}
            <option value="{{id}}">{{nombre}}</option>
            {{/sesion}}
        </select>

        <button>Confirmar ejemplar</button>
    </form>


</div>


{{>footer}}
