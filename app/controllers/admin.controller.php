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
        
        function addProduct($params = []){
            /*$user = $this->authHelper->UsuarioActual();
            if(!$user){
                $this->view->response('Unauthorized', 401);
                return;
            }
            if($user->role!='ADMIN'){
                $this->view->response('Forbidden', 403);
                return;
            }*/

            $body = $this->getData();

            $nombre_producto = $body->nombre_producto;
            $precio = $body->precio;
            $id_categoria = $body->id_categoria;

            $id = $this->model->insertProduct($nombre_producto, $precio, $id_categoria);

            $this->view->response('Se ha insertado el producto con el id= ' .$id, 201);
        }
        function updateProduct($params = []){
            /*$user = $this->authHelper->UsuarioActual();
            if(!$user){
                $this->view->response('Unauthorized', 401);
                return;
            }
            if($user->role!='ADMIN'){
                $this->view->response('Forbidden', 403);
                return;
            }*/
            
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
        function addCategory($params = []){
            /*$user = $this->authHelper->UsuarioActual();
            if(!$user){
                $this->view->response('Unauthorized', 401);
                return;
            }
            if($user->role!='ADMIN'){
                $this->view->response('Forbidden', 403);
                return;
            }*/

            $body = $this->getData();

            $nombre = $body->nombre;

            $id = $this->model->insertCategory($nombre);

            $this->view->response('Categoria insertada correctamente. id = ' .$id, 201);
        }
        function updateCategory($params = []){
            /*$user = $this->authHelper->UsuarioActual();
            if(!$user){
                $this->view->response('Unauthorized', 401);
                return;
            }
            if($user->role!='ADMIN'){
                $this->view->response('Forbidden', 403);
                return;
            }*/
            
            $id_categoria = $params[':ID'];
            $categoria = $this->model->getCategoryById($id_categoria);

            if($categoria){
                $body = $this->getData();

                $nombre = $body->nombre;

                $category = $this->model->updateCategory($nombre, $id_categoria);
                $this->view->response('La categoria con id = ' .$id_categoria. ' ha sido modificada exitosamente', 200);
            }
            else{
                $this->view->response('La categoria = ' .$id_categoria. 'no existe', 404);
            }
        }
    }