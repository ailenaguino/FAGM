{{> headerLogeado}}
<br>
<table class="table table-striped table-bordered ">
    <tr>
        <th class="text-center">Nombre del ejemplar</th>
        <th class="text-center">Categoria</th>
        <th class="text-center">Precio</th>
        <th class="text-center">¿Te queres suscribir?</th>
    </tr>
    {{#ejemplar}}
    <tr>
        <td class="text-center">{{ejemplar}}</td>
        <td class="text-center">{{categoria}}</td>
        <td class="text-center">${{precio}}</td>
        <td class="text-center">
            <form action="" method="POST">
                <input type="hidden" name="id" value="{{id}}">
                <button type="submit" class="btn btn-success btn-sm">Suscribirse</button>
            </form>
        </td>
    </tr>

    {{/ejemplar}}
</table>
{{> footer}}
