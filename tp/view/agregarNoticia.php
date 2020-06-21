{{> headerLogeado}}
<div class="container pt-5 my-3 border">
<h2 class="text-center">Crear Noticia</h2>

<form method="POST" enctype="multipart/form-data" action="/noticia/validar">

    <!--<label>Ejemplar:</label>
    <select class="form-control mb-5" name="categoria">
        {{#ejemplar}}
        <option value="{{id}}">{{nombre}}</option>
        {{/ejemplar}}
    </select>-->

    <div class="form-group">
        <label>Titulo:</label>
        <input type="text" name="titulo" id="" placeholder="Titulo" class="form-control" required>
    </div>


    <div class="form-group">
        <label>Subtitulo:</label>
        <input type="text" name="subtitulo" id="" placeholder="Subtitulo" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Contenido:</label>
        <textarea type="text" name="contenido" id="" placeholder="Contenido" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label>Ubicacion:</label>
        <input type="text" name="ubicacion" id="" placeholder="Olé" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Link de :</label>
        <input type="text" name="link" id="" placeholder="www.f.com" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Video:</label>
        <input type="text" name="video" id="" placeholder="Olé" class="form-control" required>
    </div>


    <div class="col clearfix">
        <input type="submit" value="Aceptar" class="btn btn-info float-right">
        <a class="btn btn-info" href="/usuario/contenidista">Atrás</a>
    </div>
    {{#id}}
        <input type="hidden" name="seccion" value={{id}}>
    {{/id}}


</form>
</div>
{{> footer}}