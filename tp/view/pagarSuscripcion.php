{{> headerLogeado}}
<div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-4">Pagar suscripcion</h1>
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">
                            <form role="form" action="procesarPagoEjemplar" method="post">
                                {{#data}}
                                <input type="hidden" name="idEjemplar" value="{{data}}">
                                {{/data}}
                                <div class="form-group"> <label for="username">
                                        <h6>Nombre en la tarjeta</h6>
                                    </label> <input type="text" name="username"  required class="form-control "> </div>
                                <div class="form-group"> <label for="cardNumber">
                                        <h6>Numero de la tarjeta</h6>
                                    </label>
                                    <div class="input-group">
                                        <input type="number" name="cardNumber" class="form-control " required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>Fecha de vencimiento</h6>
                                                </span></label>
                                            <div class="input-group">
                                                <input type="number" placeholder="MM" name="mes" class="form-control" required>
                                                <input type="number" placeholder="AAAA" name="anio" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="El codigo de 3 digitos que se encuentra detras de la tarjeta">
                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                            </label> <input type="text" name="cvv" required class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Confirmar </button>
                            </form>
                        </div>
                    </div> <!-- End -->
                </div>
                {{#error}}
                <h5 class="text-danger">{{error}}</h5>
                {{/error}}
            </div>
        </div>
    </div>

</div>
</div>
{{> footer}}
