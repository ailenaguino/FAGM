{{> headerLogeado}}
<h4 class="mt-4">Mis suscripciones</h4>
<table class="table table-striped table-bordered mt-4">
    <tr>
        <th class="text-center">Ejemplar</th>
        <th class="text-center">Fecha de suscripcion</th>
        <th class="text-center">Precio</th>
    </tr>
    {{#contenido}}


    <td class="text-center">{{nombre}}</td>
    <td class="text-center">{{fecha}}</td>
    <td class="text-center">${{precio}}</td>

    </tr>

    {{/contenido}}
</table>

<a class="mt-4 btn btn-primary btn-lg active text-center" role="button" aria-pressed="true" target="_blank" href="/usuario/generarResumenDeSuscripciones">Generar resumen</a>

{{> footer}}