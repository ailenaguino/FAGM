{{> headerLogeado}}
<div class="container pt-5 my-3 border">
    <h2 class="text-center mb-5">Generar gráfico de barras según ventas por día</h2>

    <form method="POST" enctype="multipart/form-data" action="/edicion/generarGraficoBarras">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Inicio:</label>
                <input type="date" name="inicio" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label>Fin:</label>
                <input type="date" name="fin" class="form-control" required>
            </div>
        </div>

        <div class="col clearfix my-2">
            <input type="submit" value="Generar" class="btn btn-info float-right  mx-3">
            <a class="btn btn-info float-right" href="/usuario/estadisticasAdmin">Atrás</a>
        </div>
    </form>

    <hr/>

    <div id="top_x_div" style="width: 800px; height: 600px;"></div>
</div>

{{> footer}}