<?php

require '../vendor/autoload.php';
require 'Controller.php';
$uri = $_SERVER['REQUEST_URI'];
$controller = new Controller();
$router = new AltoRouter();

$router->map('GET', '/', 'home');
$router->map('GET', '/home', 'home');
$router->map('GET', '/contact', 'contact', 'contact');

$match = $router->match();

echo $controller->head();

if (is_array($match)) {
    $params = $match['params'];
    require "../templates/{$match['target']}.php";
} else {
    require "../templates/errors/404.php";
}

echo $controller->footer();

?>