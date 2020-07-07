{{> headerLogeado}}
<br>
<h5 class="text-center">Noticias con la suscripcion</h5>

<div class="row mt-5">
    {{#direccion}}
    <div class="col-md-4 mt-3">
        <div class="card" style="width: 100%; height: 100%;">
            <img src="/images/{{direccion}}" class="card-img-top" alt="..." style="height: 14rem;">
            <div class="card-body">
                <form action="/noticia/verNoticiaCompleta" method="POST">
                    <input type="hidden" name="id" value="{{id}}">
                    <h5 class="card-title">{{titulo}}</h5>
                    <p class="card-text">{{subtitulo}}</p>
                    <button type="submit" class="btn btn-primary btn-block">Leer noticia</button>
                </form>
            </div>
        </div>
    </div>
    {{/direccion}}
</div>

<h5 class="text-center">Noticias con la compra de edicion</h5>
<div class="row mt-5">
    {{#edicion}}
    <div class="col-md-4 mt-3">
        <div class="card" style="width: 100%; height: 100%;">
            <img src="/images/{{direccion}}" class="card-img-top" alt="..." style="height: 14rem;">
            <div class="card-body">
                <form action="/noticia/verNoticiaCompleta" method="POST">
                    <input type="hidden" name="id" value="{{id}}">
                    <h5 class="card-title">{{titulo}}</h5>
                    <p class="card-text">{{subtitulo}}</p>
                    <button type="submit" class="btn btn-primary btn-block">Leer noticia</button>
                </form>
            </div>
        </div>
    </div>
    {{/edicion}}
</div>
{{> footer}}
