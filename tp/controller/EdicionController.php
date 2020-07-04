<?php


class EdicionController
{
    private $renderer;
    private $model;
    private $modelEjemplar;
    private $modelSeccion;

    public function __construct($model, $renderer, $ejemplar, $seccion){
        $this->renderer = $renderer;
        $this->model = $model;
        $this->modelEjemplar = $ejemplar;
        $this->modelSeccion = $seccion;
    }

    public function index(){
        $data["ejemplares"]=$this->modelEjemplar->obtenerEjemplares();
        $data["secciones"]=$this->modelSeccion->obtenerSecciones();
        echo $this->renderer->render("view/agregarEdicion.php", $data);
    }

    public function listar(){
        $data["ediciones"] = $this->model->obtenerEdiciones();
        echo $this->renderer->render("view/listarEdiciones.php", $data);
    }

    public function editar(){
        $id=$_POST["id"];
        $data["edicion"] = $this->model->obtenerEdicionPorId($id);
        $data["ejemplares"]=$this->modelEjemplar->obtenerEjemplares();
        $data["secciones"]=$this->modelSeccion->obtenerSecciones();
        echo $this->renderer->render("view/editarEdicion.php", $data);
    }

    public function validarEdicion(){
        $data["id"]=$_POST["id"];
        $data["nombre"]=ucfirst($_POST["nombre"]);
        $data["numero"] = $_POST["numero"];
        $data["id_ejemplar"] = $_POST["ejemplar"];
        $data["precio"] = $_POST["precio"];;

        $this->model->update($data);

        if(isset($_POST["seccion"])){
            $arraySeccion = $_POST["seccion"];
            $this->model->eliminarRelacion($data["id"]);

            for($i=0; $i<count($arraySeccion); $i++) {
                $this->model->insertarRelacion($data["id"], $arraySeccion[$i]);
            }
        }

        $data2["mensaje"] = "Edición editada correctamente";

        $data2["edicion"] = $this->model->obtenerEdicionPorId($data["id"]);
        $data2["ejemplares"]=$this->modelEjemplar->obtenerEjemplares();
        $data2["secciones"]=$this->modelSeccion->obtenerSecciones();
        echo $this->renderer->render("view/editarEdicion.php", $data2);
    }


    public function validar(){
        if(isset($_POST["seccion"])){
            $data = array();
            $data["nombre"] = ucfirst($_POST["nombre"]);
            $data["numero"] = $_POST["numero"];
            $data["id_ejemplar"] = $_POST["ejemplar"];
            $data["precio"] = $_POST["precio"];
            $arraySeccion = $_POST["seccion"];

            $resultado = $this->validarRepeticiones($data["nombre"], $data["numero"], $data["id_ejemplar"]);

            if($resultado==true) {
                $this->model->insertar($data);
                $result = $this->model->traerIdDeEdicion();
                $IdEdicion=0;

                foreach ($result as $a){
                    foreach ($a as $b){
                        $IdEdicion=$b;
                    }
                }
                for($i=0; $i<count($arraySeccion); $i++) {
                    $this->model->insertarRelacion($IdEdicion, $arraySeccion[$i]);
                }

                $mensaje= "Edición agregada correctamente";

            }else{
                $mensaje= "Edición repetida";
            }
        }else {
            $mensaje = "Tilde al menos una sección";
        }

                $data["ejemplares"]=$this->modelEjemplar->obtenerEjemplares();
                $data["secciones"]=$this->modelSeccion->obtenerSecciones();
                $data["mensaje"]=$mensaje;
                echo $this->renderer->render("view/agregarEdicion.php", $data);
    }

    public function validarRepeticiones($nombre, $numero, $ejemplar){
        $resultado = $this->model->buscarEdicionEspecífica(ucfirst($nombre), $numero, $ejemplar);

        if($resultado!=null) {
            return false;
        }else {
            return true;
        }
    }

    public function listaAdmin(){
        $data["ediciones"] = $this->model->obtenerEdiciones();
        echo $this->renderer->render("view/listaEdicionesAdmin.php", $data);
    }
    public function listaConte(){
        $data["ediciones"] = $this->model->obtenerEdiciones();
        echo $this->renderer->render("view/listaEdicionesConte.php", $data);
    }
    public function cambiarEstado()
    {
        $id = $_POST["id"];
        $estado = $_POST["estado"];
        if ($estado == 1) {
            $estado = 0;
        } else {
            $estado = 1;
        }
        $this->model->cambiarEstado($id, $estado);
        $data["ediciones"] = $this->model->obtenerEdiciones();
        echo $this->renderer->render("view/listaEdicionesAdmin.php", $data);
    }

    public function mostrarEdiciones(){
        $data['edicion']=$this->model->obtenerEdicionesConSuEjemplar();
        echo $this->renderer->render("view/mostrarEdiciones.php", $data);
    }

    public function generarGrafico(){
        $data = array();
        $data["inicio"]=$_POST["inicio"];
        $data["fin"]=$_POST["fin"];
        $resultado = $this->model->generarGraficoTorta($data);

        echo $this->renderer->render("view/generarGraficoTorta.php");
        ?>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {

              var data = google.visualization.arrayToDataTable([
                      ['Producto', 'Cantidad Vendida'],
                      <?php
                  while($fila = $resultado->fetch_assoc()){
                      echo "['".$fila["nombre"]."',".$fila["cantidad"]."],";
                  }
                        ?>
                  ]);

              var options = {
                  title: 'Cantidad de productos vendidos en un periodo de tiempo'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
          }
        </script>
    <?php
    }

    public function formularioGraficoTorta(){
        echo $this->renderer->render("view/generarGraficoTorta.php");
    }

    public function generarGraficoBarras(){
        $data = array();
        $data["inicio"]=$_POST["inicio"];
        $data["fin"]=$_POST["fin"];
        $resultado = $this->model->generarGraficoBarras($data);

        echo $this->renderer->render("view/generarGraficoVentas.php");
        ?>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawStuff);

            function drawStuff() {
                var data = new google.visualization.arrayToDataTable([
                    ['Fecha', 'Cantidad de Ventas'],
                    <?php
                    while($fila = $resultado->fetch_assoc()){
                        echo "['".$fila["dia"]."',".$fila["cantidad"]."],";
                    }
                    ?>
                ]);

                var options = {
                    width: 800,
                    legend: { position: 'none' },
                    chart: {
                        title: 'Cantidad de Ventas por día'},
                    axes: {
                        x: {
                            0: { side: 'top', label: 'Fecha'} // Top x-axis.
                        }
                    },
                    bar: { groupWidth: "90%" }
                };

                var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                // Convert the Classic options to Material options.
                chart.draw(data, google.charts.Bar.convertOptions(options));
            };
        </script>
        <?php
    }

    public function formularioGraficoBarras(){
        echo $this->renderer->render("view/generarGraficoVentas.php");
    }
}