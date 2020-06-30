{{> headerLogeado}}
<br>
<table class="table table-striped table-bordered ">
    <tr>
        <th class="text-center">Titulo</th>
        <th class="text-center">Subtitulo</th>
        <th class="text-center">Fotografia</th>
        <th class="text-center">¿La queres leer?</th>
    </tr>
    {{#direccion}}


        <td class="text-center">{{titulo}}</td>
        <td class="text-center">{{subtitulo}}</td>

        <td class ="text-center"><img src=/images/{{direccion}} width="100" height="100"</img></td>

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
{{> footer}}
