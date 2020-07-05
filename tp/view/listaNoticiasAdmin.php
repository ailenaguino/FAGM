{{> headerAdmin}}

<div class="form-group">
    <h2>Noticias</h2>
    <a href="/noticia/index"  class="btn btn-outline-primary mb-3 float-right">Crear nueva Noticia</a>

    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th class="text-center" scope="col">Id</th>
            <th class="text-center" scope="col">Titulo</th>
            <th class="text-center" scope="col">Seccion Id</th>
            <th class="text-center" scope="col">Usuario Id</th>.
            <th class="text-center" scope="col">Estado</th>
        </tr>
        </thead>
        <tbody>
        {{#noticias}}
            <tr>
                <td class="text-center">{{id}}</td>
                <td class="text-center">{{titulo}}</td>
                <td class="text-center">{{id_seccion}}</td>
                <td class="text-center">{{id_usuario}}</td>
                <td class="text-center">
                    <form action="/noticia/cambiarEstado" method="POST">
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
        {{/noticias}}
        </tbody>
    </table>
    <a href="/usuario/listaAdmin" class="btn btn-outline-danger my-3 ml-3">Volver</a>
</div>
{{> footer}}