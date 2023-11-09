<?php
    require_once 'app/models/product.model.php';
    require_once 'app/views/api.view.php';
    class productApiController{
        private $view;
        private $model;
        function __construct(){
            $this->model = new productModel();
            $this->view = new ApiView();
        }
        function getAll(){
            $tareas = $this->model->getProducts();
            $this->view->response($tareas, 200);
        }
    }