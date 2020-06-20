{{> header}}
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">Cancion</h2>
    <table class="w3-table">
        {{#cancion}}
        <tr>
            <td>{{nombre}}</td>
            <td>{{duracion}}</td>
        </tr>
        {{/cancion}}
    </table>
</div>
{{> footer}}
