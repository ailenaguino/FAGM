{{> headerAdmin}}

<div class="form-group mt-5">
    <h2>Ejemplares</h2>
    <a href="/ejemplar/index" class="btn btn-outline-primary mb-3 float-right">Crear nuevo Ejemplar</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th class="text-center" scope="col">Nombre</th>
            <th class="text-center" scope="col">Categoria</th>
            <th class="text-center" scope="col">Estado</th>
            <th class="text-center" scope="col">Editar</th>
        </tr>
        </thead>
        <tbody>
        {{#ejemplares}}
        <tr>
            <td class="text-center">{{ejemplar}}</td>
            <td class="text-center">{{categoria}}</td>
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
            <form method="post" action="/ejemplar/editar">
                <input type="hidden" name="id" value="{{id}}">
                <td class="text-center"><button type="submit" class="btn btn-outline-primary mb-3">Editar</button></td>
            </form>
        </tr>
        {{/ejemplares}}
        </tbody>
    </table>
    <a href="/usuario/listaAdmin" class="btn btn-outline-danger my-3 ml-3">Volver</a>
</div>
{{> footer}}