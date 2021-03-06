<?php
require_once("helper/Renderer.php");
include_once("helper/Database.php");
include_once("helper/Config.php");
require_once('third-party/mustache/src/Mustache/Autoloader.php');


class ModuleInitializer
{
    private $renderer;
    private $config;
    private $database;

    public function __construct()
    {
        $this->renderer = new Renderer('view/partial');
        $this->config = new Config("config/config.ini");
        $this->database = Database::createDatabaseFromConfig($this->config);
    }

    public function createUsuarioController()
    {
        include_once("model/NoticiaModel.php");
        include_once("model/EdicionModel.php");
        include_once("model/EjemplarModel.php");
        include_once("model/SeccionModel.php");
        include_once("model/FotoModel.php");
        include_once("model/UsuarioModel.php");
        include_once("controller/UsuarioController.php");
        include_once('pdf/fpdf.php');
        $pdf=new FPDF();

        $model = new UsuarioModel($this->database);
        $ejemplar = new EjemplarModel($this->database);
        $edicion = new EdicionModel($this->database);
        $seccion = new SeccionModel($this->database);
        $foto=new FotoModel($this->database);
        $noticia=new NoticiaModel($this->database);
        return new UsuarioController($model,$this->renderer,$pdf,$ejemplar,$edicion,$seccion,$foto,$noticia);
    }

    public function createCategoriaController(){
        include_once("model/CategoriaModel.php");
        include_once("controller/CategoriaController.php");
        $model = new CategoriaModel($this->database);
        return new CategoriaController($model,$this->renderer);
    }

    public function createSeccionController(){
        include_once("model/SeccionModel.php");
        include_once("controller/SeccionController.php");
        $model = new SeccionModel($this->database);
        return new SeccionController($model,$this->renderer);
    }

    public function createEjemplarController(){
        include_once("model/EjemplarModel.php");
        include_once("model/CategoriaModel.php");
        include_once("controller/EjemplarController.php");
        $model = new EjemplarModel($this->database);
        $categoria = new CategoriaModel($this->database);
        return new EjemplarController($model,$this->renderer, $categoria);
    }

    public function createEdicionController(){
        include_once("model/EdicionModel.php");
        include_once("controller/EdicionController.php");
        include_once("model/EjemplarModel.php");
        include_once("model/SeccionModel.php");
        $model = new EdicionModel($this->database);
        $ejemplar = new EjemplarModel($this->database);
        $seccion = new SeccionModel($this->database);
        return new EdicionController($model,$this->renderer, $ejemplar, $seccion);
    }
    public function createFotoController(){
        include_once("model/FotoModel.php");
        include_once("controller/FotoController.php");
        $model = new FotoModel($this->database);
        return new FotoController($model,$this->renderer);
    }

    public function createNoticiaController(){
        include_once("model/NoticiaModel.php");
        include_once("model/EdicionModel.php");
        include_once("model/EjemplarModel.php");
        include_once("model/SeccionModel.php");
        include_once("model/FotoModel.php");
        include_once("model/UsuarioModel.php");
        include_once("controller/NoticiaController.php");

        $model = new NoticiaModel($this->database);
        $ejemplar = new EjemplarModel($this->database);
        $edicion = new EdicionModel($this->database);
        $seccion = new SeccionModel($this->database);
        $foto=new FotoModel($this->database);
        $usuario=new UsuarioModel($this->database);
        return new NoticiaController($model,$this->renderer,$ejemplar,$edicion,$seccion,$foto,$usuario);
    }


    public function createDefaultController()
    {
        return $this->createUsuarioController();
    }
}