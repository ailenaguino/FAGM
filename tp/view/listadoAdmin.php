{{> headerAdmin}}
<div class="container mt-5 ">
    <h2 class="text-center">Accedé al producto que desees</h2>
    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card border-light" style="width: 14rem;">
                <img src="/view/assets/revista.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Ejemplares</h5>
                    <p class="card-text">Mira los ejemplares que están disponibles, elegi si activarlo o desactivarlo</p>
                    <a href="/ejemplar/listaAdmin" class="btn btn-primary btn-block">Listar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-light" style="width: 14rem;">
                <img src="/view/assets/actualizar.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Secciones</h5>
                    <p class="card-text">Mira las secciones que están disponibles, elegi si activarlo o desactivarlo</p>
                    <a href="/seccion/listaAdmin" class="btn btn-primary btn-block">Listar</a>
                </div>
            </div>
           </div>

        <div class="col-md-3">
            <div class="card border-light" style="width: 14rem;">
                <img src="/view/assets/dia.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Ediciones</h5>
                    <p class="card-text">Mira las ediciones que están disponibles, elegi si activarlo o desactivarlo</p>
                    <a href="/edicion/listaAdmin" class="btn btn-primary btn-block">Listar</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-light" style="width: 14rem;">
                <img src="/view/assets/periodista.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Noticias</h5>
                    <p class="card-text">Mira las noticias que están disponibles, elegi si activarlo o desactivarlo</p>
                    <a href="/noticia/listaAdmin" class="btn btn-primary btn-block">Listar</a>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <a href="/usuario/index" class="btn btn-outline-danger ml-3">Volver</a>
</div>
{{> footer}}