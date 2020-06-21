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
        include_once("model/UsuarioModel.php");
        include_once("controller/UsuarioController.php");
        $model = new UsuarioModel($this->database);
        return new UsuarioController($model,$this->renderer);
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
        include_once("controller/EjemplarController.php");
        $model = new EjemplarModel($this->database);
        return new EjemplarController($model,$this->renderer);
    }

    public function createEdicionController(){
        include_once("model/EdicionModel.php");
        include_once("controller/EdicionController.php");
        $model = new EdicionModel($this->database);
        return new EdicionController($model,$this->renderer);
    }

    public function createNoticiaController(){
        include_once("model/NoticiaModel.php");
        include_once("controller/NoticiaController.php");
        $model = new NoticiaModel($this->database);
        return new NoticiaController($model,$this->renderer);
    }


    public function createDefaultController()
    {
        return $this->createUsuarioController();
    }
}