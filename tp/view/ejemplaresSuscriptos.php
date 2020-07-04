{{> headerLogeado}}
<table class="table table-striped table-bordered ">
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
<div class="text-center" style="max-width:800px" id="band">
    <br>
    <a class="btn btn-primary btn-lg active text-center" role="button" aria-pressed="true" target="_blank" href="/usuario/generarResumenDeSuscripciones">Generar resumen</a>
</div>
{{> footer}}