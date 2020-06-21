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
        $ejemplares["ejemplares"]=$this->model->obtenerEjemplares();
        echo $this->renderer->render("view/agregarEdicion.php", $ejemplares);
    }


    public function validar(){
        $data = array();
        $data["nombre"] = ucfirst($_POST["nombre"]);
        $data["numero"] = $_POST["numero"];
        $data["id_ejemplar"] = $_POST["ejemplar"];

        $resultado = $this->validarRepeticiones($data["nombre"], $data["numero"], $data["id_ejemplar"]);

        if($resultado==true) {
            $this->model->insertar($data);

            $mensaje["mensaje"] = "Edición agregada correctamente";
        }else{
            $mensaje["mensaje"] = "Edición repetida";
        }

        echo $this->renderer->render("view/agregarEdicion.php", $mensaje);
    }

    public function validarRepeticiones($nombre, $numero, $ejemplar){
        $resultado = $this->model->buscarSeccionEspecífica(ucfirst($nombre), $numero, $ejemplar);

        if($resultado!=null) {
            return false;
        }else {
            return true;
        }
    }
}