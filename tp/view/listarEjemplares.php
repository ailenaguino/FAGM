{{> headerLogeado}}
<table class="table my-5">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Precio</th>
        <th scope="col">Categoría</th>
        <th scope="col">Estado</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    {{#ejemplares}}
    <tr>
        <td>{{nombre}}</td>
        <td>${{precio}}</td>
        <td>{{id_categoria}}</td>
        {{#estado}}
        <td>Activo</td>
        {{/estado}}
        {{^estado}}
        <td>Inactivo</td>
        {{/estado}}
        <td>
            <form action="/ejemplar/editar" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{id}}" >
                <button type="submit" class="btn btn-outline-dark btn-block">Editar</button>
            </form>
        </td>
    </tr>
    {{/ejemplares}}
    </tbody>
</table>
{{> footer}}