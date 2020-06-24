<?php


class CategoriaController
{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        echo $this->renderer->render("view/agregarCategoria.php");
    }

    public function agregar(){
        echo $this->renderer->render("view/agregarCategoria.php");
    }

    public function validar(){
        $data = array();
        $data["nombre"] = ucfirst($_POST["nombre"]);

        $resultado = $this->validarNombre($data["nombre"]);

        if($resultado==true) {
            $this->model->insertar($data);

            $mensaje["mensaje"] = "Categoria agregada correctamente";
        }else{
            $mensaje["mensaje"] = "Categoría incorrecta";
        }
        echo $this->renderer->render("view/agregarCategoria.php", $mensaje);
    }

    public function validarNombre($nombre){
        $resultado = $this->model->buscarNombreCategoria(ucfirst($nombre));

        if($resultado!=null) {
            return false;
        }elseif(!ctype_alpha($nombre)){
            return false;
        }else {
            return true;
        }
    }
}