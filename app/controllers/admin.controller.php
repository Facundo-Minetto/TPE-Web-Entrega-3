<?php
    require_once 'app/models/adminModel.php';
    require_once 'app/models/product.model.php';
    require_once 'app/controllers/api.controller.php';
    class AdminController extends ApiController{
        private $model;

        function __construct(){
            parent::__construct();
            $this->model = new AdminModel();
        }
        function delete($params = null){
            $id = $params[':ID'];
            $tarea = $this->model->getProduct($params[':ID']);

            if($tarea){
                $this->model->deleteProduct($id);
                $this->view->response('El producto con id = ' .$id. ' ha sido borrado', 200);
            }
            else{
                $this->view->response('El producto con id = ' .$id. ' no existe', 404);
            }
        }
        function addProduct($params = []){
            $body = $this->getData();

            $nombre_producto = $body->nombre_producto;
            $precio = $body->precio;
            $id_categoria = $body->id_categoria;

            $id = $this->model->insertProduct($nombre_producto, $precio, $id_categoria);

            $this->view->response('Se ha insertado el producto con el id= ' .$id, 201);
        }
        function updateProduct($params = []){
            $product_id = $params[':ID'];
            $product = $this->model->getProduct($product_id);

            if($product){
                $body = $this->getData();

                $nombre_producto = $body->nombre_producto;
                $precio = $body->precio;
                $id_categoria = $body->id_categoria;

                $this->model->updateProduct($nombre_producto, $precio, $id_categoria, $product_id);

                $this->view->response('El producto con id = ' .$product_id. ' ha sido modificado', 200);
            }
            else{
                $this->view->response('El producto con id = ' .$product_id. ' no existe', 404);
            }
        }
    }