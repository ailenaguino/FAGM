{{> headerLogeado}}
<br>
<table class="table table-striped table-bordered ">
    <tr>
        <th class="text-center">Nombre de la seccion</th>
    </tr>
    {{#secciones}}
    <tr>
        <td class="text-center">{{nombre}}</td>
    {{/secciones}}

</table>
<a href="/usuario/index" class="btn btn-outline-danger my-3 ml-3">Volver</a>
{{> footer}}
