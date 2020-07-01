{{> headerLogeado}}

<div class="form-group mt-5">
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th class="text-center" scope="col">Id</th>
            <th class="text-center" scope="col">Nombre</th>
            <th class="text-center" scope="col">Id categoria</th>
            <th class="text-center" scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
        {{#ejemplares}}
        <tr>
            <td class="text-center">{{id}}</td>
            <td class="text-center">{{nombre}}</td>
            <td class="text-center">{{id_categoria}}</td>
            <td class="text-center">
                <form action="/ejemplar/cambiarEstado" method="POST">
                    <input type="hidden" name="estado" value="{{estado}}">
                    <input type="hidden" name="id" value="{{id}}" >
                    {{#estado}}
                    <button type="submit" class="btn btn-success btn-sm">Activo</button>
                    {{/estado}}
                    {{^estado}}
                    <button type="submit" class="btn btn-warning btn-sm">Inactivo</button>
                    {{/estado}}
                </form>
            </td>
        </tr>
        {{/ejemplares}}
        </tbody>
    </table>
    <a href="/usuario/login" class="btn btn-outline-danger my-3 ml-3">Volver</a>
</div>
{{> footer}}