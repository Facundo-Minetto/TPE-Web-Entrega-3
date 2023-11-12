<?php
    require_once 'libs/router.php';
    require_once 'app/controllers/products.api.controller.php';
    require_once 'app/controllers/categorias.api.controller.php';
    require_once 'app/controllers/admin.controller.php';
    require_once 'app/controllers/usuario.api.controller.php';
    
    $router = new Router();

    #                 endpoint                                                verbo                       controller                       metodo
    $router->addRoute('productos',                                            'GET',                      'productApiController',          'getProducts');           //consigna 2
    $router->addRoute('productos/:ID',                                        'GET',                      'productApiController',          'getProducts');           //consigna 4
    $router->addRoute('administrador/productos',                              'POST',                     'AdminController',               'addProduct');            //consigna 5
    $router->addRoute('administrador/productos/:ID',                          'PUT',                      'AdminController',               'updateProduct');         //consigna 5
    $router->addRoute('administrador/productos/:ID/:subrecurso',              'GET',                      'productApiController',          'getProducts');     

    $router->addRoute('categorias',                                           'GET',                      'categoriasController',          'getCategorys');          //consigna 2
    $router->addRoute('categorias/:ID',                                       'GET',                      'categoriasController',          'getCategorys');          //consigna 4
    $router->addRoute('administrador/categorias',                             'POST',                     'AdminController',               'addCategory');           //consigna 5
    $router->addRoute('administrador/categorias/:ID',                         'PUT',                      'AdminController',               'updateCategory');        //consigna 5
    $router->addRoute('administrador/categorias/:ID/:subrecurso',             'GET',                      'categoriasController',          'getCategorys');

    $router->addRoute('usuario/token',                                        'GET',                      'UsuarioApiController',          'getToken');

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);