{{> headerLogeado}}
<div class="conteiner">
    {{#noticia}}
        <h1 class="text-center">{{titulo}}</h1>
        <a class="float-right">{{ubicacion}}</a>
        <h3>{{subtitulo}}</h3><br>
        <a>{{link}}</a><br><br>
        <p>{{contenido}}</p><br>
        <h5>{{video}}</h5><br>
    {{/noticia}}
    {{#fotos}}
        <h5 class="text-center">{{direccion}}</h5>
    {{/fotos}}
    <a href="/noticia/mostrarPortadaNoticia" class="btn btn-outline-danger my-3 ml-3">Volver</a>
</div>
{{> footer}}