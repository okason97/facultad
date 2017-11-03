<?php

if(isset($_GET['controller'])){
	$controllerName = $_GET['controller'].Controller;
}else{
	$controllerName = "LoginController";
}

if(isset($_GET["action"])){
	$actionName = $_GET["action"];
}else{
	$actionName = basicView;
}

require_once("controller/$controllerName.php");

$controller = $controllerName::getInstance();
$controller->$actionName();