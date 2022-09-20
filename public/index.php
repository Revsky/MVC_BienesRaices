<?php 

    /* Este sera nuestro archivo principal y sera el que se encargara de llamar a todo el MVC */

    require_once __DIR__ . '/../includes/app.php';

    use MVC\Router;

    $router = new Router();
?>