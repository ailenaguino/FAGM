{{> headerAdmin}}

<div class="container mt-5 ">
    <div class="row">
        <div class="col-md-6">
            <div class="card" >
                <img class="card-img-top" src="/view/assets/crecimiento.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Productos vendidos</h5>
                    <p class="card-text">Generar grafico con los productos vendidos entre el tiempo seleccionado.</p>
                    <a target="_blank" href="/usuario/mostrarContenidistas" class="btn btn-primary btn-block">Generar pdf</a>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="card" >
                <img class="card-img-top" src="/view/assets/grafico-circular.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Suscripciones realizadas </h5>
                    <p class="card-text">Generar grafico con las suscripciones realizadas entre el tiempo seleccionado.</p>
                    <a target="_blank" href="/usuario/mostrarClientesYProductos" class="btn btn-primary btn-block">Generar pdf</a>
                </div>
            </div>

        </div>


    </div>
</div>
{{> footer}}