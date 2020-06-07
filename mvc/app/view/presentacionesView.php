{{> header}}
<div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">Presentaciones</h2>
    <table class="w3-table">
        <tr>
            <th>nombre</th>
            <th>ubicacion</th>
            <th>email</th>
        </tr>
        {{#users}}
        <tr>
            <td>{{nombre}}</td>
            <td>{{ubicacion}}</td>
            <td>{{email}}</td>
        </tr>
        {{/users}}
    </table>
</div>
{{> footer}}