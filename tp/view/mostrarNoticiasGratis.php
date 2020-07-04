{{> headerLogeado}}
<br>
<h5 class="text-center">Noticias con la suscripcion</h5>
<br>
<table class="table table-striped table-bordered ">
    <tr>
        <th class="text-center">Titulo</th>
        <th class="text-center">Subtitulo</th>
        <th class="text-center">Fotografia</th>
        <th class="text-center">Ejemplar</th>
        <th class="text-center">¿La queres leer?</th>
    </tr>
    {{#direccion}}


        <td class="text-center">{{titulo}}</td>
        <td class="text-center">{{subtitulo}}</td>

        <td class ="text-center"><img src=/images/{{direccion}} width="100" height="100"</img></td>


        <td class="text-center">{{nombreEjemplar}}</td>
        <td class="text-center">
            <form action="/noticia/verNoticiaCompleta" method="POST">
                <input type="hidden" name="id" value="{{id}}">
                <input type="hidden" name="idFoto" value="{{idFoto}}">
                <button type="submit" class="btn btn-success btn-sm">Ver noticia</button>
            </form>
        </td>
    </tr>

    {{/direccion}}
</table>

<br>
<h5 class="text-center">Noticias con la compra de edicion</h5>
<br>
<table class="table table-striped table-bordered ">
    <tr>
        <th class="text-center">Titulo</th>
        <th class="text-center">Subtitulo</th>
        <th class="text-center">Fotografia</th>
        <th class="text-center">Edicion</th>
        <th class="text-center">¿La queres leer?</th>
    </tr>
    {{#edicion}}


    <td class="text-center">{{titulo}}</td>
    <td class="text-center">{{subtitulo}}</td>

    <td class ="text-center"><img src=/images/{{direccion}} width="100" height="100"</img></td>


    <td class="text-center">{{nombreEdicion}}</td>
    <td class="text-center">
        <form action="/noticia/verNoticiaCompleta" method="POST">
            <input type="hidden" name="id" value="{{id}}">
            <input type="hidden" name="idFoto" value="{{idFoto}}">
            <button type="submit" class="btn btn-success btn-sm">Ver noticia</button>
        </form>
    </td>
    </tr>

    {{/edicion}}
</table>
{{> footer}}
