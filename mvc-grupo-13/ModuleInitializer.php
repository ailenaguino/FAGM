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
    public function createDefaultController()
    {
        return $this->createUsuarioController();
    }
}