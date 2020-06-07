<?php

class PresentacionesController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function index(){
        $data["presentaciones"] = $this->model->getPresentaciones();
        echo $this->renderer->render( "view/presentacionesView.php", $data );
    }
}