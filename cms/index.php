<?php

session_start();

function __autoload($classname) {
    if (strpos($classname, 'Collection') > 0) {
        require_once(dirname(__FILE__).'/../common/models/collections/'.strtolower(str_replace('Collection', '', $classname)).'.php');
    } elseif (strpos($classname, 'Entity') > 0) {
        require_once(dirname(__FILE__).'/../common/models/entities/'.strtolower(str_replace('Entity', '', $classname)).'.php');
    } elseif (strpos($classname, 'Controller') > 0 && $classname != 'CmsController') {
        require_once(dirname(__FILE__).'/../common/controllers/cms/'.strtolower(str_replace('Controller', '', $classname)).'.php');
    } else {
        require_once(dirname(__FILE__).'/../common/system/'.strtolower($classname).'.php');
    }
}

$controller = 'index';
$action = 'index';

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$controller .= 'Controller';

$obj = new $controller();
$obj->$action();




?>