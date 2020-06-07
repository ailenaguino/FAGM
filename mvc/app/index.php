<?php
require_once("ModuleInitializer.php");
require_once("Router.php");

$module = $_GET["module"];
$action = $_GET["action"];

$moduleInitializer = new ModuleInitializer();

Router::executeActionFromController($moduleInitializer, $module, $action);

