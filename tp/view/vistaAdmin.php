{{> headerAdmin}}

    <div class="container mt-5 ">
        <div class="row">
            <div class="col-md-8 text-center">
                <h2>Gracias por trabajar en Infonete!</h2>
            </div>
            <div class="col-md-4">
                <img src="/view/assets/escritura.png"style="width: 14rem;">
            </div>
        </div>
    </div>

<div class="row mt-5">
    <div class="col-md-3">
        <div class="card" style="width: 14rem;">
            <img src="/view/assets/edit.svg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Editar roles</h5>
                <p class="card-text">Edita los roles de los usuarios y registralos.<p>
                <a href="/usuario/editarRol" class="btn btn-primary btn-block">Listar</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" style="width: 14rem;">
            <img src="/view/assets/list.svg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Listar componentes</h5>
                <p class="card-text">Mira los componentes, crealos y listalos.</p>
                <a href="/usuario/listaAdmin" class="btn btn-primary btn-block">Listar</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" style="width: 14rem;">
            <img src="/view/assets/pdf.svg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Generar pdf</h5>
                <p class="card-text">Genera los pdf que deseas.</p>
                <a href="/usuario/generarPdfs" class="btn btn-primary btn-block">Listar</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card" style="width: 14rem;">
            <img src="/view/assets/graph.svg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Generar graficos</h5>
                <p class="card-text">Genera los graficos que deseas.</p>
                <a href="/usuario/estadisticasAdmin" class="btn btn-primary btn-block">Listar</a>
            </div>
        </div>
    </div>
</div>


{{> footer}}