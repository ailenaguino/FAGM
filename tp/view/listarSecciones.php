{{> headerLogeado}}
<table class="table my-5">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Estado</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    {{#secciones}}
    <tr>
        <th scope="row">{{id}}</th>
        <td>{{nombre}}</td>
        {{#estado}}
        <td>Activo</td>
        {{/estado}}
        {{^estado}}
        <td>Inactivo</td>
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
{{> footer}}