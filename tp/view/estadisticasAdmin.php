{{> headerAdmin}}

<div class="container mt-5 ">
    <div class="row">
        <div class="col-md">
            <div class="card border-light" >
                <img class="card-img-top" src="/view/assets/grafico-circular.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Productos vendidos</h5>
                    <p class="card-text">Generar grafico con los productos vendidos entre el tiempo seleccionado.</p>
                    <a target="_blank" href="/edicion/formularioGraficoTorta" class="btn btn-primary btn-block">
                        Generar Gráfico</a>
                </div>
            </div>
        </div>


        <div class="col-md">
            <div class="card border-light" >
                <img class="card-img-top" src="/view/assets/crecimiento.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Suscripciones realizadas </h5>
                    <p class="card-text">Generar grafico con las suscripciones realizadas día a día entre el tiempo seleccionado.</p>
                    <a target="_blank" href="/ejemplar/formularioGraficoSuscripciones" class="btn btn-primary btn-block">
                        Generar Gráfico</a>
                </div>
            </div>

        </div>

        <div class="col-md">
            <div class="card border-light" >
                <img class="card-img-top" src="/view/assets/barras.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Productos vendidos</h5>
                    <p class="card-text">Generar grafico con las ventas realizadas día a día entre el tiempo seleccionado.</p>
                    <a target="_blank" href="/edicion/formularioGraficoBarras" class="btn btn-primary btn-block">
                        Generar Gráfico</a>
                </div>
            </div>

        </div>


    </div>
    <hr/>
    <a href="/usuario/index" class="btn btn-outline-danger ml-3">Volver</a>
</div>
{{> footer}}