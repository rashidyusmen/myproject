<?php

session_start();

function __autoload($classname) {
    if (strpos($classname, 'Collection') > 0) {
        require_once(dirname(__FILE__).'/../common/models/collections/'.strtolower(str_replace('Collection', '', $classname)).'.php');
    } elseif (strpos($classname, 'Entity') > 0) {
        require_once(dirname(__FILE__).'/../common/models/entities/'.strtolower(str_replace('Entity', '', $classname)).'.php');
    } elseif (strpos($classname, 'Controller') > 0) {
        require_once(dirname(__FILE__).'/../common/controllers/website/'.strtolower(str_replace('Controller', '', $classname)).'.php');
    } else {
        require_once(dirname(__FILE__).'/../common/system/'.strtolower($classname).'.php');
    }
}

$frontcontroller = 'index';
$frontaction = 'index';

if (isset($_GET['frontcontroller'])) {
    $frontcontroller = $_GET['frontcontroller'];
}

if (isset($_GET['frontaction'])) {
    $frontaction = $_GET['frontaction'];
}

$frontcontroller .= 'Controller';

$obj = new $frontcontroller();
$obj->$frontaction();




?>