{{> headerLogeado}}

    <br>

    {{#ultima}}
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h1 class="display-4 bg-danger text-white font-weight-bold">{{titulo}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <img src="/images/{{direccion}}" class="img-fluid" width="100%">
                <blockquote class="blockquote text-right bg-light" style="position:relative;bottom: 10%;">
                    <p class="mb-0">{{subtitulo}}</p>
                    <footer class="blockquote-footer">Escrito por <cite title="Source Title" class="text-capitalize">{{nombre}}</cite></footer>
                    <button class="mb-0 text-left btn btn-danger">Leer</button>
                </blockquote>
            </div>
        </div>
    </div>
{{/ultima}}

<h3 class="text-center display-4">Noticias gratis</h3>

    <div class="row mt-5">
        {{#direccion}}
        <div class="col-md-4 mt-3">
            <div class="card" style="width: 100%; height: 100%;">
                <img src="/images/{{direccion}}" class="card-img-top" alt="..." style="height: 14rem;">
                <div class="card-body">
                    <h5 class="card-title">{{titulo}}</h5>
                    <p class="card-text">{{subtitulo}}</p>
                    <form action="/noticia/verNoticiaCompleta" method="POST">
                        <input type="hidden" name="id" value="{{id}}">
                        <button type="submit" class="btn btn-primary btn-block">Leer noticia</button>
                    </form>
                </div>
            </div>
        </div>
        {{/direccion}}
    </div>
<br>
    <h4 class="text-center display-4 text-danger ">Contenido premium</h4>
<div class="row mt-5">
    {{#premium}}
    <div class="col-md-4 mt-3">
        <div class="card" style="width: 100%; height: 100%;">
            <img src="/images/{{direccion}}" class="card-img-top" alt="..." style="height: 14rem;">
            <div class="card-body">
                <h5 class="card-title">{{titulo}}</h5>
                <p class="card-text">{{subtitulo}}</p>
                <form action="/usuario/validarLecturaPremium" method="POST">
                    <input type="hidden" name="id" value="{{id}}">
                    <button type="submit" class="btn btn-primary btn-block">Leer noticia</button>
                </form>
            </div>
        </div>
    </div>
    {{/premium}}
</div>

    <h2 class="text-center my-3">Los diarios y revistas mas consumidos de Argentina</h2>
<br>

<div class="row mt-5 ">
    {{#ejemplar}}
    <div class="col-md-4">
        <div class="card" style="width: 14rem;">
            <img src="/view/assets/portadaEjemplar.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center">{{ejemplar}}</h5>
                <p class="card-text">{{categoria}}<p>
                <h5 class="card-title text-center">${{precio}}</h5>
                <form action="/ejemplar/pagarSuscripcion" method="POST">
                    <input type="hidden" name="id" value="{{id}}">
                    <button type="submit" class="btn btn-primary btn-block">Suscribirse</button>
                </form>
            </div>
        </div>
    </div>
    {{/ejemplar}}
</div>

<h2 class="text-center my-3">Las ultimas ediciones</h2>

<div class="row mt-5 ">
    {{#edicion}}
    <div class="col-md-4">
        <div class="card" style="width: 14rem;">
            <img src="/view/assets/portadaEdicion.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center">{{nombreEdicion}}</h5>
                <p class="card-text">Numero de edicion: {{numero}}<p>
                <p class="card-text">Ejemplar: {{nombreEjemplar}}<p>
                <h5 class="card-title text-center">${{precio}}</h5>
                <form action="/seccion/mostrarSeccionesDeLaEdicion" method="POST">
                    <input type="hidden" name="id" value="{{id}}">
                    <button type="submit" class="btn btn-success btn-block">Ver secciones</button>
                </form>
                <br>
                <form action="/edicion/comprarEdicion" method="POST">
                    <input type="hidden" name="id" value="{{id}}">
                    <button type="submit" class="btn btn-primary btn-block">Comprar</button>
                </form>
            </div>
        </div>
    </div>
    {{/edicion}}
</div>

{{> footer}}

