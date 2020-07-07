{{> headerLogeado}}
{{#noticia}}
<h3 class="display-4 text-center">{{titulo}}</h3>
<h4 class="text-warning text-center">Para leer esta noticia tenés que comprar la edicion o suscribirte al ejemplar</h4>
{{#fotos}}
    <div class="col-md-4">
        <img src="/images/{{direccion}}" width="100%">
    </div>
{{/fotos}}
<div class="row mt-5">
    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body">
                {{#edicion}}
                <h5 class="card-title">{{nombre}}</h5>
                <p class="card-text">Compra esta edicion por tan solo <span class="font-weight-bold">${{precio}}<span></span></p>
                <form action="/edicion/comprarEdicion" method="POST">
                    <input type="hidden" name="id" value="{{id}}">
                    <button type="submit" class="btn btn-success ">Comprar</button>
                </form>
                {{/edicion}}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-center">
            <div class="card-body">
                {{#ejemplar}}
                <h5 class="card-title">{{nombre}}</h5>
                <p class="card-text">Suscribite a este ejemplar por tan solo <span class="font-weight-bold">${{precio}} por mes.</span></p>

                <form action="/ejemplar/pagarSuscripcion" method="POST">
                    <input type="hidden" name="id" value="{{id}}">
                    <button type="submit" class="btn btn-success ">Suscribirse</button>
                </form>
                {{/ejemplar}}
            </div>
        </div>
    </div>
</div>
{{/noticia}}
{{> footer}}