<?php

class QuieroSerParteController{
    private $renderer;

    public function __construct( $renderer){
        $this->renderer = $renderer;
    }

    public function index(){
        echo $this->renderer->render( "view/quieroSerParteView.php");
    }

    public function procesarFormulario(){
        $data = array();
        $data["nombre"] = $_POST["nombre"];
        $data["instrumento"]  = $_POST["instrumento"];
        echo $this->renderer->render( "view/quiereSerParteView.php", $data);
    }
}