{{> headerLogeado}}
<div class="container pt-5 my-3 border">
    <h2 class="text-center">Generar gráfico de suscripciones</h2>

    <form method="POST" enctype="multipart/form-data" action="/ejemplar/generarGraficoSuscripciones">

        <div class="form-group">
            <label>Inicio:</label>
            <input type="date" name="inicio" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Fin:</label>
            <input type="date" name="fin" class="form-control" required>
        </div>

        <div class="col clearfix">
            <input type="submit" value="Aceptar" class="btn btn-info float-right">
            <a class="btn btn-info" href="/usuario/login">Atrás</a>
        </div>

    </form>

    <hr/>

    <div id="top_x_div" style="width: 800px; height: 600px;"></div>
</div>

{{> footer}}