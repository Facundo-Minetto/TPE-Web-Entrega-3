<?php
    require_once 'app/controllers/api.controller.php';
    require_once 'app/helpers/autenticar.api.helper.php';
    require_once 'app/models/product.model.php';

    class productApiController extends ApiController{

        private $model;
        private $authHelper;

        function __construct(){
            parent::__construct();
            $this->model = new productModel();
            $this->authHelper = new AutenticarHelper();
        }
        function get($params = []){
            $user = $this->authHelper->UsuarioActual();
            if(!$user){
                $this->view->response('Unauthorized', 401);
                return;
            }
            if($user->role!='ADMIN'){
                $this->view->response('Forbidden', 403);
                return;
            }


            if(empty($params)){
                $tareas = $this->model->getProducts();
                $this->view->response($tareas, 200);
            }
            else{
                $tarea = $this->model->getProduct($params[':ID']);
                if(!empty($tarea)){
                    $this->view->response($tarea, 200);
                }
                else{
                    $this->view->response(['msg' => 'La tarea con el id = '.$params[':ID']. ' no existe'] , 404);
                }
            }
        }
        
        











    }