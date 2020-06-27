{{> headerLogeado}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>


<div class="container pt-5 my-3 border">
    <h2 class="text-center">Buscar usuario</h2>
    <div class="row" style="display: flex; align-items: center;">
        <div class="col-md-10">
            <select class='mi-selector' name='marcas' style="width: 100%;" >
                {{#usuarios}}
                <option class="id" value='{{id}}'>{{nombre}}</option>
                {{/usuarios}}
            </select>
        </div>
        <div class="col-md-2">
            <form method="post" action="/usuario/buscarUsuario">
                <input id="usuario" type="hidden" name="id" value="1">
                <button class="btn btn-success">Elegir usuario</button>
            </form>
        </div>
    </div>





    {{#state}}
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
            {{#encontrados}}
            <tr>
                <td>{{id}}</td>
                <td>{{nombre}}</td>
                <td>{{id_rol}}</td>
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
            {{/encontrados}}
        </tbody>

    </table>
    {{/state}}
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

