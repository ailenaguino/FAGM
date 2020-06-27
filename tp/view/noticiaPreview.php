{{>header}}

<div class="container my-5">
    {{#id}}
        <h2 class="display-2">{{titulo}}</h2>
        <h3>{{subtitulo}}</h3>
        <p>{{contenido}}</p>
        <a href="{{link}}">{{link}}</a>
        <p>Ubicación: {{ubicacion}}</p>
        {{#direccion}}
            <img src="/images/{{direccion}}"</img>
        {{/direccion}}
    {{/id}}

    <form method="POST" action="/noticia/guardarImagen" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="form-control" id="file" name="file">
                {{#id}}
                <input type="hidden" name="id" value="{{id}}">
                {{/id}}
            </div>
        </div>
        <button class="btn btn-info">cargar imagen</button>
    </form>

</div>
{{>footer}}