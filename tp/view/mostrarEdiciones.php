{{> headerLogeado}}
<br>
<table class="table table-striped table-bordered ">
    <tr>
        <th class="text-center">Nombre de la edicion</th>
        <th class="text-center">Número</th>
        <th class="text-center">Precio</th>
        <th class="text-center">Pertenece al ejemplar</th>
        <th class="text-center">Detalle</th>
        <th class="text-center">¿La queres comprar?</th>
    </tr>
    {{#edicion}}
    <tr>
        <td class="text-center">{{nombreEdicion}}</td>
        <td class="text-center">{{numero}}</td>
        <td class="text-center">${{precio}}</td>
        <td class="text-center">{{nombreEjemplar}}</td>
        <td class="text-center">
            <form action="/seccion/mostrarSeccionesDeLaEdicion" method="POST">
                <input type="hidden" name="id" value="{{id}}">
                <button type="submit" class="btn btn-success btn-sm">Ver</button>
            </form>
        </td>
        <td class="text-center">
            <form action="comprarEdicion" method="POST">
                <input type="hidden" name="id" value="{{id}}">
                <button type="submit" class="btn btn-success btn-sm">Comprar</button>
            </form>
        </td>
    </tr>

    {{/edicion}}
</table>
{{> footer}}