<?php
    require_once 'libs/router.php';
    require_once 'app/controllers/products.api.controller.php';
    require_once 'app/controllers/categorias.api.controller.php';
    require_once 'app/controllers/admin.controller.php';
    require_once 'app/controllers/usuario.api.controller.php';
    
    $router = new Router();

    #                 endpoint                                                verbo                       controller                       metodo
    $router->addRoute('productos',                                            'GET',                      'productApiController',          'getProducts');           
    $router->addRoute('productos/:ID',                                        'GET',                      'productApiController',          'getProducts');           
    $router->addRoute('productos',                                            'POST',                     'AdminController',               'addProduct');            
    $router->addRoute('productos/:ID',                                        'PUT',                      'AdminController',               'updateProduct');        
    $router->addRoute('productos/:ID/:subrecurso',                            'GET',                      'productApiController',          'getProducts');     

    $router->addRoute('categorias',                                           'GET',                      'categoriasController',          'getCategorys');          
    $router->addRoute('categorias/:ID',                                       'GET',                      'categoriasController',          'getCategorys');          
    $router->addRoute('categorias',                                           'POST',                     'AdminController',               'addCategory');           
    $router->addRoute('categorias/:ID',                                       'PUT',                      'AdminController',               'updateCategory');        
    $router->addRoute('categorias/:ID/:subrecurso',                           'GET',                      'categoriasController',          'getCategorys');

    $router->addRoute('usuario/token',                                        'GET',                      'UsuarioApiController',          'getToken');

    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
