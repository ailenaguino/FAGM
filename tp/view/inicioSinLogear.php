{{> header}}

<h1 class="text-center">InfoNete</h1>
<h6 id="subtitle" class="text-center text-secondary font-weight-bold"></h6>
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>¿No estas registrado?</strong> Podes hacerlo ya mismo haciendo <a class="text-dark font-weight-bold" href="/usuario/registro">click acá</a>.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
{{#ultima}}
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="height: 30rem;">
    <div class="carousel-inner" style="height: 100%;">
        <div class="carousel-item active" style="height: 100%;">
            <img src="/images/{{direccion}}" class="d-block w-100" alt="..." style="height: 100%;">
            <div class="carousel-caption d-none d-md-block bg-danger">
                <h2>{{titulo}}</h2>
                <p class="mb-0 bg-danger text-center">{{subtitulo}}</p>
                <footer class="blockquote-footer text-white">Escrito por <cite title="Source Title" class="text-capitalize">{{nombre}}</cite></footer>
                <form action="/noticia/verNoticiaCompleta" method="POST">
                    <input type="hidden" name="id" value="{{id}}">
                    <button type="submit" class="mb-0 mt-1 text-left btn btn-outline-light">Leer</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{/ultima}}

<h3 class="text-center display-4 mt-5">Noticias gratis <span class="badge badge-primary">Nuevo</span></h3>

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
            <svg  width="100%" height="18em" viewBox="0 0 16 16" class="text-secondary bi bi-book-half" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>
                <path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869z"/>
            </svg>            <div class="card-body">
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
            <svg width="100%" height="18em" viewBox="0 0 16 16" class="text-secondary bi bi-journal-album" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 1h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1H2a2 2 0 0 1 2-2z"/>
                <path d="M2 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H2zm3-6.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1-.5-.5v-5z"/>
                <path fill-rule="evenodd" d="M6 11.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z"/>
            </svg>              <div class="card-body">
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

<script>
    var f = new Date();
    let x=document.getElementById('subtitle');
    x.innerHTML= f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear() +" Revistas Diarios Noticias del momento - Invierno 2020";
    $('.alert').alert();
</script>