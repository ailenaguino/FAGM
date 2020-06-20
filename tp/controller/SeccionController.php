<?php


class SeccionController
{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        echo $this->renderer->render("view/agregarSeccion.php");
    }


    public function validar(){
        $data = array();
        $data["nombre"] = ucfirst($_POST["nombre"]);

        $resultado = $this->validarNombre($data["nombre"]);

        if($resultado==true) {
            $this->model->insertar($data);

            $mensaje["mensaje"] = "Seccion agregada correctamente";
        }else{
            $mensaje["mensaje"] = "Seccion incorrecta";
        }

        echo $this->renderer->render("view/agregarSeccion.php", $mensaje);
    }

    public function validarNombre($nombre){
        $resultado = $this->model->buscarNombreSeccion(ucfirst($nombre));

        if($resultado!=null) {
            return false;
        }elseif(!ctype_alpha($nombre)){
            return false;
        }else {
            return true;
        }
    }
}