<?php

class CancionesController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        //$data["canciones"] = $this->model->obtenerCanciones();
        echo "XD"; //$this->renderer->render( "view/cancionesView.php", $data );
    }

    public function cancion(){
        $id = $_GET["id"];
        $cancion = $this->model->obtenerCancion($id);
        $data["cancion"] = $cancion[0];
        echo $this->renderer->render( "view/cancionView.php", $data );
    }
}