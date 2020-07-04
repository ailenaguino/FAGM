{{> headerContenidista}}

<div class="form-group mt-5">
    <h2>Ediciones</h2>
    <a href="/edicion/index">Crear nueva Edición</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th class="text-center" scope="col">Id</th>
            <th class="text-center" scope="col">Nombre</th>
            <th class="text-center" scope="col">Numero</th>
            <th class="text-center" scope="col">Id ejemplar</th>
            <th class="text-center" scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
        {{#ediciones}}
        <tr>
            <td class="text-center">{{id}}</td>
            <td class="text-center">{{nombre}}</td>
            <th class="text-center">{{numero}}</th>
            <td class="text-center">{{id_ejemplar}}</td>
            <td class="text-center">
                <form action="/edicion/cambiarEstado" method="POST">
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
        {{/ediciones}}
        </tbody>
    </table>
    <a href="/usuario/listaConte" class="btn btn-outline-danger my-3 ml-3">Volver</a>
</div>
{{> footer}}