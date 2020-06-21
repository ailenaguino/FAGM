{{>header}}

<div class="container my-5">
    {{#id}}
        <h2 class="display-2">{{titulo}}</h2>
        <h3>{{subtitulo}}</h3>
        <p>{{contenido}}</p>
        <a href="{{link}}">{{link}}</a>
        <p>Ubicación: {{ubicacion}}</p>
    {{/id}}

    <form method="post" action="noticia/guardarImagen" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Elegir fotos</label>
                {{#id}}
                <input type="hidden" name="id" value="{{id}}">
                {{/id}}
            </div>
        </div>
        <button class="btn btn-info">cargar imagen</button>
    </form>

</div>


{{>footer}}
