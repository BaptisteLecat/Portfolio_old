<?php

//use App\Controller\HomeController;

require '../vendor/autoload.php';
require 'Controller.php';
$uri = $_SERVER['REQUEST_URI'];
$appController = new Controller();
$router = new AltoRouter();

//$test = new HomeController();

$router->map('GET', '/', 'home');
$router->map('GET', '/home', 'home');
$router->map('GET', '/contact', 'contact', 'contact');

$match = $router->match();

echo $appController->head();

if (is_array($match)) {
    $params = $match['params'];
    $controllerName = "App\\Controller\\". ucfirst($match['target']) ."Controller";
    $controller = new $controllerName;

    $controller->display();
    echo $controller->getContent();
} else {
    require "../templates/errors/404.php";
}

echo $appController->footer();

?>