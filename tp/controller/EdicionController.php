<?php


class EdicionController
{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        $data["ejemplares"]=$this->model->obtenerEjemplares();
        $data["secciones"]=$this->model->obtenerSecciones();
        echo $this->renderer->render("view/agregarEdicion.php", $data);
    }


    public function validar(){
        $data = array();
        $data["nombre"] = ucfirst($_POST["nombre"]);
        $data["numero"] = $_POST["numero"];
        $data["id_ejemplar"] = $_POST["ejemplar"];
        $array = $_POST["seccion"];

        $resultado = $this->validarRepeticiones($data["nombre"], $data["numero"], $data["id_ejemplar"]);

        if($resultado==true) {
            $this->model->insertar($data);
            $result = $this->model->traerIdDeEdicion($data["nombre"], $data["numero"], $data["id_ejemplar"]);
            $data2=0;

            foreach ($result as $a){
                foreach ($a as $b){
                    $data2=$b;
                }
            }
                        for($i=0; $i<count($array); $i++) {
                            $this->model->insertarRelacion($data2, $array[$i]);
                        }

                        $mensaje["mensaje"] = "Edición agregada correctamente";

                    }else{
                        $mensaje["mensaje"] = "Edición repetida";
                    }

                    echo $this->renderer->render("view/agregarEdicion.php", $mensaje);
    }

    public function validarRepeticiones($nombre, $numero, $ejemplar){
        $resultado = $this->model->buscarEdicionEspecífica(ucfirst($nombre), $numero, $ejemplar);

        if($resultado!=null) {
            return false;
        }else {
            return true;
        }
    }
}