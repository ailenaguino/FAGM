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

    public function mostrarEdiciones(){
        $data['edicion']=$this->model->obtenerEdicionesConSuEjemplar();
        echo $this->renderer->render("view/mostrarEdiciones.php", $data);
    }
}