{{> headerAdmin}}

    <div class="container mt-5 ">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/view/assets/escritura.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Contenidistas</h5>
                        <p class="card-text">Genera un pdf con los contenidistas de InfoNete y su informacion basica.</p>
                        <a target="_blank" href="/usuario/mostrarContenidistas" class="btn btn-primary btn-block">Generar pdf</a>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/view/assets/comprar.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Productos adquiridos </h5>
                        <p class="card-text">Podes ver rapidamente a los clientes que compraron ediciones y sus ejemplares correspondientes.</p>
                        <a target="_blank" href="/usuario/mostrarClientesYProductos" class="btn btn-primary btn-block">Generar pdf</a>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="/view/assets/ventas.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Ventas totales</h5>
                        <p class="card-text">Visualiza en pdf los numeros de las ventas y suscripciones totales, de cada ejemplar.</p>
                        <a target="_blank" href="/usuario/suscripcionesDeProducto" class="btn btn-primary btn-block">Generar pdf</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{> footer}}