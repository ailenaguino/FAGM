{{> headerLogeado}}

    <br>
    <h1 class="text-center ">Noticias gratis</h1>
    <br>
    <div class="row mt-5 ">
        {{#direccion}}
        <div class="col-md-4 ">
            <div class="card" style="width: 14rem;">
                <img src="/images/{{direccion}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">{{titulo}}</h5>
                    <p class="card-text">{{subtitulo}}<p>
                    <form action="/noticia/verNoticiaCompleta" method="POST">
                        <input type="hidden" name="id" value="{{id}}">
                        <button type="submit" class="btn btn-primary btn-block">Ver noticia</button>
                    </form>
                </div>
            </div>
        </div>
        {{/direccion}}
    </div>
<br>

    <h4 class="text-center display-4 text-danger ">Contenido premium</h4>
    <br><br><br><br>

    <h1 class="text-center ">Ejemplares</h1>
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

<h1 class="text-center ">Ediciones</h1>

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

