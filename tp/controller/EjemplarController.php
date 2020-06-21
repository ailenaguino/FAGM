<?php


class EjemplarController
{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        $categorias["categorias"]=$this->model->obtenerCategorias();
        echo $this->renderer->render("view/agregarEjemplar.php", $categorias);
    }


    public function validar(){
        $data = array();
        $data["nombre"] = ucfirst($_POST["nombre"]);
        $data["id_categoria"] = $_POST["categoria"];

        $resultado = $this->validarNombre($data["nombre"], $data["id_categoria"]);

        if($resultado==true) {
            $this->model->insertar($data);

            $mensaje["mensaje"] = "Ejemplar agregado correctamente";
        }else{
            $mensaje["mensaje"] = "El ejemplar ya existe";
        }

        echo $this->renderer->render("view/agregarEjemplar.php", $mensaje);
    }

    public function validarNombre($nombre, $categoria){
        $resultado = $this->model->buscarEjemplarDeCategoria(ucfirst($nombre), $categoria);

        if($resultado!=null) {
            return false;
        }else {
            return true;
        }
    }

}