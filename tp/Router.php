<?php

class Router{
    public static function executeActionFromController($moduleInitializer, $module, $action){
        $controller = self::createControllerFrom($moduleInitializer, $module);
        self::executeActionFrom($controller, $action);
    }

    private static function createControllerFrom($moduleInitializer,$module){
        $controllerName = self::createControllerNameFromModule($module);
        $validController = method_exists($moduleInitializer, $controllerName) ? $controllerName : "createDefaultController";
        $controller = call_user_func(array($moduleInitializer, $validController));
        return $controller;
    }

    private static  function createControllerNameFromModule($module){
        return "create" . ucfirst($module) . "Controller";
    }

    private static function executeActionFrom($controller, $action){
        $validAction = method_exists($controller, $action) ? $action : "index";
        call_user_func(array($controller, $validAction));
    }
}