<?php

class NoticiaController
{
    private $renderer;
    private $model;
    private $modelEjemplar;
    private $modelEdicion;
    private $modelSeccion;
    private $modelFoto;
    private $modelUsuario;

    public function __construct($model, $renderer,$ejemplar,$edicion,$seccion,$foto,$usuario){
        $this->renderer = $renderer;
        $this->model = $model;
        $this->modelEjemplar=$ejemplar;
        $this->modelEdicion=$edicion;
        $this->modelSeccion=$seccion;
        $this->modelFoto=$foto;
        $this->modelUsuario=$usuario;
    }

    public function index(){
        $ejemplares["sesion"]=$this->modelEjemplar->obtenerEjemplares();
        echo $this->renderer->render("view/elegirEjemplar.php",$ejemplares);
    }

    public function mostrarEdiciones(){
        if(isset($_POST['ejemplar'])){
            $id=$_POST["ejemplar"];
            $resultados["sesion"]=$this->modelEdicion->obtenerEdicionesDeEjemplar($id);
            echo $this->renderer->render("view/elegirEdicion.php",$resultados);
        }else{
            echo $this->index();
        }
    }

    public function mostrarSecciones(){
        if(isset($_POST['edicion'])){
            $id=$_POST["edicion"];
            $resultados["sesion"]=$this->modelSeccion->obtenerSeccionesPorEdicion($id);
            $resultados["id_edicion"]=$id;
            echo $this->renderer->render("view/elegirSeccion.php",$resultados);
        }else{
            echo $this->index();
        }
    }

    public function crearNoticia(){
        if(isset($_POST['seccion'])){
            $data['id']=$_POST['seccion'];
            $data["id_edicion"]=$_POST['id_edicion'];
            echo $this->renderer->render("view/agregarNoticia.php",$data);
        }else{
            echo $this->index();
        }
    }

    public function listaAdmin(){
        $data["noticias"] = $this->model->obtenerNoticiasConSeccionYUsuario();
        echo $this->renderer->render( "view/listaNoticiasAdmin.php", $data);
    }
    public function listaConte(){
        $data["noticias"] = $this->model->obtenerNoticiasConSeccionYUsuario();
        echo $this->renderer->render( "view/listaNoticiasConte.php", $data);
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
        $data["noticias"] = $this->model->obtenerNoticiasConSeccionYUsuario();
        echo $this->renderer->render( "view/listaNoticiasAdmin.php", $data);
    }

    public  function eliminar(){
        $id=$_POST["id"];
        $this->model->eliminar($id);
        $data["noticias"] = $this->model->obtenerNoticias();
        echo $this->renderer->render( "view/listaNoticiasAdmin.php", $data);
    }

    public function validar(){
        $data = array();
        $data["video"]=$_POST["video"];
        $data["link"]=$_POST["link"];
        $data["ubicacion"]=$_POST["ubicacion"];
        $data["contenido"]=$_POST["contenido"];
        $data["subtitulo"]=$_POST["subtitulo"];
        $data["titulo"]=$_POST["titulo"];
        $data["id_seccion"]=$_POST["seccion"];
        $data["id_usuario"]='';
        $data["precio"]=$_POST["precio"];
        $data["id_edicion"]=$_POST['id_edicion'];

        $id=$this->modelUsuario->obtenerId($_SESSION['name']);
        $id=$id[0]['id'];
        $data["id_usuario"]=$id;

       $bol=$this->model->insertar($data);

        if($bol!=false){
            $data["id"]=$this->model->ultimoId();

            echo $this->renderer->render("view/noticiaPreview.php", $data);
        }else{
            echo "error";
        }
    }
    public function mostrarNoticia($id){
        if($_SESSION['name']){
            if($_SESSION['rol']!=1){
                $data['id']=$this->model->obtenerNoticia($id);
                $data['direccion']=$this->modelFoto->obtenerFoto($id);
                echo $this->renderer->render("view/elegirMasFotos.php", $data);
            }else{
                header("Location:/usuario/index");
            }
        }else{
            header("Location:/usuario/index");
        }
    }

    public function mostrarPortadaNoticia(){
        if($_SESSION['name']){
            $id=$this->modelUsuario->obtenerId($_SESSION['name']);
            $id=$id[0]['id'];
            $data['direccion']=$this->model->obtenerNoticiasPagas($id);
            $data['edicion']=$this->model->obtenerNoticiasPagasEdicion($id);
            echo $this->renderer->render("view/mostrarNoticiasGratis.php", $data);
        }else{
            header("Location:/usuario/index");
        }

    }

    public function verNoticiaCompleta(){
        $data['noticia']=$this->model->obtenerNoticia($_POST["id"]);
        $data['fotos']=$this->modelFoto->obtenerFoto($_POST["id"]);

        if(isset($_SESSION['name'])){
            $data['sesion']=true;
        }else{
            $data['sesion']=false;
        }
        echo $this->renderer->render("view/verNoticiaCompleta.php", $data);
    }

    public function guardarImagen(){
        $nombre_img = $_FILES['file']['name'];
        $tmp_name=$_FILES["file"]["tmp_name"];
        $error=$_FILES["file"]["error"];
            if(!$error>0){
                if(file_exists("images/" . $nombre_img)){
                    echo "El archivo con el nombre ".$nombre_img . " ya existe. ";
                }else{
                    move_uploaded_file($tmp_name,"images/" . $nombre_img);
                    $insertar = $this->modelFoto->guardarImagen($nombre_img,$_POST['id']);
                    if($insertar){
                        $img=$this->modelFoto->ultimaFoto();
                        $this->mostrarNoticia($_POST['id']);
                    }else{
                        echo "Ha fallado la subida, reintente nuevamente.";
                    }

                }
            }


    }

}