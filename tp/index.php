<?php
require_once("ModuleInitializer.php");
require_once("Router.php");
session_start();

$module = $_GET["module"]?$_GET["module"]:"usuario";
$action = $_GET["action"]?$_GET["action"]:"index";

$moduleInitializer = new ModuleInitializer();

Router::executeActionFromController($moduleInitializer, $module, $action);





