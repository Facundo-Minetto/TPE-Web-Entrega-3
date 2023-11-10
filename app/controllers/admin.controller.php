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
            $product = $this->model->getProduct($params[':ID']);

            if($product){
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


        function getCategorys($params = []){
            if(empty($params)){
                $categorys = $this->model->getCategorys();
                $this->view->response($categorys, 200);
            }
            else{
                $category = $this->model->getCategory($params[':ID']);
                if(!empty($category)){
                    $this->view->response($category, 200);
                }
                else{
                    $this->view->response('El id categoria = ' .$params[':ID']. 'no existe', 404);
                }
            }
        }
        function addCategory($params = []){
            $body = $this->getData();

            $nombre = $body->nombre;

            $id = $this->model->insertCategory($nombre);

            $this->view->response('Categoria insertada correctamente. id = ' .$id, 201);
        }
        function updateCategory($params = []){
            $id_categoria = $params[':ID'];
            $categoria = $this->model->getCategory($id_categoria);

            if($categoria){
                $body = $this->getData();

                $nombre = $body->nombre;

                $category = $this->model->updateCategory($nombre, $id_categoria);
                $this->view->response('La categoria con id = ' .$id_categoria. 'ha sido modificada exitosamente', 200);
            }
            else{
                $this->view->response('La categoria = ' .$id_categoria. 'no existe', 404);
            }
        }
        function deleteCategory($params = []){
            $id_categoria = $params[':ID'];
            $categoria = $this->model->getCategory($id_categoria);

            if($categoria){
                $this->model->deleteCategory($id_categoria);
                $this->view->response('La categoria con id = ' .$id_categoria. 'ha sido eliminada exitosamente', 200);
            }
            else{
                $this->view->response('La categoria con el id = ' .$id_categoria. 'no existe', 404);
            }
        }
    }