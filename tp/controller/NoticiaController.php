<?php


class NoticiaController
{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }
    public function listaDeNoticias(){
        $data["noticias"] = $this->model->obtenerNoticias();
        echo $this->renderer->render( "view/listaNoticias.php", $data);
    }
    public function cambiarEstado(){
        $id=$_POST["id"];
        $estado=$_POST["estado"];
        if($estado==1){
            $estado=0;
        }else{
            $estado=1;
        }
        $this->model->cambiarEstado($id,$estado);
        $data["noticias"] = $this->model->obtenerNoticias();
        echo $this->renderer->render( "view/listaNoticias.php", $data);
    }
    public  function eliminar(){
        $id=$_POST["id"];
        $this->model->eliminar($id);
        $data["noticias"] = $this->model->obtenerNoticias();
        echo $this->renderer->render( "view/listaNoticias.php", $data);
    }
}