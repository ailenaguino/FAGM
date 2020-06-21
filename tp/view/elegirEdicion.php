{{>header}}

<div class="container my-5">
    <h2>Elegir edicion para la noticia</h2>
    <form method="POST" enctype="multipart/form-data" action="/noticia/mostrarSecciones">

        <select class="my-5" name="edicion">
            {{#sesion}}
            <option value="{{id}}">{{nombre}} | Numero: {{numero}} | {{id}}</option>
            {{/sesion}}
        </select>

        <button>Confirmar edicion</button>
    </form>


</div>


{{>footer}}
