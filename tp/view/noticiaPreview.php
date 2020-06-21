{{>header}}

<div class="container my-5">
    {{#id}}
        <h2>{{titulo}}</h2>
        <h1>{{id}}</h1>
        <h4>{{subtitulo}}</h4>
        <p>{{contenido}}</p>
        <a href="{{link}}">{{link}}</a>
        <span>{{ubicacion}}</span>
    {{/id}}

    <form method="post" action="noticia/guardarImagen" enctype="multipart/form-data">
        <input type="file" name="file">
        {{#id}}
        <input type="hidden" name="id" value="{{id}}">
        {{/id}}
        <button>cargar imagen</button>
    </form>

</div>


{{>footer}}
