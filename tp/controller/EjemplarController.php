<?php


class EjemplarController
{
    private $renderer;
    private $model;
    private $modelCategoria;

    public function __construct($model, $renderer, $categoria){
        $this->renderer = $renderer;
        $this->model = $model;
        $this->modelCategoria = $categoria;
    }

    public function index(){
        $categorias["categorias"]=$this->modelCategoria->obtenerCategorias();
        echo $this->renderer->render("view/agregarEjemplar.php", $categorias);
    }


    public function validar(){
        $data = array();
        $data["nombre"] = ucfirst($_POST["nombre"]);
        $data["id_categoria"] = $_POST["categoria"];
        $data["precio"] = $_POST["precio"];

        $resultado = $this->validarNombre($data["nombre"], $data["id_categoria"]);

        if($resultado==true) {
            $value=$this->model->insertar($data);
            if($value){
                $mensaje["mensaje"] = "Ejemplar agregado correctamente";
            }else{
                $mensaje["mensaje"] = "Algo salio mal";
            }
        }else{
            $mensaje["mensaje"] = "El ejemplar ya existe";
        }

        $data["categorias"]=$this->modelCategoria->obtenerCategorias();
        $data["mensaje"]=$mensaje;
        echo $this->renderer->render("view/agregarEjemplar.php", $data);
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