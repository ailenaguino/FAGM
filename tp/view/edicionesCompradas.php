{{> headerLogeado}}
<h4 class="mt-4">Mis compras</h4>

<table class="table table-striped table-bordered mt-4">
    <tr>
        <th class="text-center">Edicion</th>
        <th class="text-center">Fecha de compra</th>
        <th class="text-center">Precio</th>

    </tr>
    {{#contenido}}


    <td class="text-center">{{nombre}}</td>
    <td class="text-center">{{fecha}}</td>
    <td class="text-center">${{precio}}</td>

    </tr>

    {{/contenido}}
</table>

<a class="mt-4 btn btn-primary btn-lg active text-center" role="button" aria-pressed="true" target="_blank" href="/usuario/generarResumenDeCompras">Generar resumen</a>

{{> footer}}
