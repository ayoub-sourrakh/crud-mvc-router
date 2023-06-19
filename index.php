<?php 

require_once 'Core/Autoload.php';
define('ROOT_PATH', __DIR__);

$router = new Core\Router;

$router->dispatch();