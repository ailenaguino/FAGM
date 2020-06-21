{{>header}}

<div class="container my-5">
    <h2>Elegir seccion para la noticia</h2>
    <form method="POST" enctype="multipart/form-data" action="/noticia/crearSeccion">
        <select class="my-5" name="seccion">
            {{#sesion}}
            <option value="{{id_seccion}}">{{nombre}} {{id_seccion}}</option>
            {{/sesion}}
        </select>

        <button>Confirmar seccion</button>
    </form>


</div>


{{>footer}}
