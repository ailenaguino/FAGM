{{>header}}

<div class="container my-5">
    {{#id}}
        <h2 class="display-2">{{titulo}}</h2>
        <h3>{{subtitulo}}</h3>
        <p>{{contenido}}</p>
        <a href="{{link}}">{{link}}</a>
        <p>Ubicación: {{ubicacion}}</p>
            {{#direccion}}
                <p>Direccion: images/{{direccion}}</p>
            {{/direccion}}
    {{/id}}

<form method="POST" action="/noticia/guardarImagen" enctype="multipart/form-data">
    <h5>Agregar otra imagen</h5>
    <div class="input-group mb-3">
        <div class="custom-file">
            <input type="file" class="form-control" id="file" name="file" onchange="habilitar();">
            {{#id}}
                <input type="hidden" name="id" value="{{id}}">
            {{/id}}
        </div>
    </div>
    <button id="buton" class="btn btn-info" disabled>Cargar imagen</button>

    <a href="noticia/" class="btn btn-success">No cargar otra imagen</a>

</form>
{{>footer}}
    <script >
        function habilitar(){
            const button = document.getElementById('buton');
            button.disabled = false;
            return false;
        }
    </script>