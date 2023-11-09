<?php
    require_once 'libs/router.php';
    require_once 'app/controllers/products.api.controller.php';
    require_once 'app/controllers/admin.controller.php';
    
    $router = new Router();

    #                 endpoint                        verbo             controller                  metodo
    $router->addRoute('productos',                    'GET',            'productApiController',     'get');            //consigna 2
    $router->addRoute('productos/:ID',                'GET',            'productApiController',     'get');            //consigna 4
    $router->addRoute('administrador/productos',      'POST',           'AdminController',          'addProduct');     //consigna 5
    $router->addRoute('administrador/productos/:ID',  'PUT',            'AdminController',          'updateProduct');  //consigna 5
    $router->addRoute('administrador/productos/:ID',  'DELETE',         'AdminController',          'delete'); 


    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);