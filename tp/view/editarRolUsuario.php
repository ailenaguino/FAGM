{{> headerLogeado}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>


<div class="container pt-5 my-3 border">
    <h2 class="text-center">Buscar usuario</h2>

    <a href="/usuario/registroDelAdmin">Agregar un nuevo usuario</a>


    <table class="table table-bordered my-5" >
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Id rol</th>
            <th>Rol</th>
        </tr>
        </thead>

        <tbody>
            {{#usuarios}}
            <tr>
                <td>{{id}}</td>
                <td>{{nombre}}</td>
                <td>{{rol}}</td>
                <td>
                    {{#rol}}
                    <form method="POST" action="/usuario/actualizarRol">
                        <div class="row">
                            <div class="col-md-8">
                                <select name="rol" class="form-control">
                                    {{#roles}}
                                    <option id="select" value="{{id}}">{{nombre}}</option>
                                    {{/roles}}
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="hidden" name="usuario" value="{{id}}">
                                <button class="btn btn-dark">Actualizar rol</button>
                            </div>
                        </div>
                    </form>
                    {{/rol}}
                </td>
            </tr>
            {{/usuarios}}
        </tbody>

    </table>

</div>

{{> footer}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    jQuery(document).ready(function($){
        $(document).ready(function() {
            $('.mi-selector').select2();
            $('.mi-selector').change(function () {
                var usuario=$('#usuario');
                usuario.val($(this).val());
            });
        });

    });

</script>

