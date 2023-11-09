<?php
    require_once 'libs/router.php';
    require_once 'app/controllers/products.api.controller.php';
    $router = new Router();

    #                 endpoint verbo    controller          metodo
    $router->addRoute('productos', 'GET', 'productApiController', 'getAll');

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);