<?php
    require_once 'app/controllers/api.controller.php';
    require_once 'app/helpers/autenticar.api.helper.php';
    require_once 'app/models/adminModel.php';
    class categoriasController extends ApiController{

        private $model;
        private $authHelper;
        
        function __construct(){
            parent::__construct();
            $this->model = new adminModel();
            $this->authHelper = new AutenticarHelper();
        }
        function getCategorys($params = []){
            if(empty($params)){
                $categorys = $this->model->getCategorys();
                $this->view->response($categorys, 200);
            }
            else{
                $category = $this->model->getCategoryById($params[':ID']);
                if(!empty($category)){
                    if($params[':subrecurso']){
                        switch($params[':subrecurso']){
                            case 'nombre':
                                $this->view->response($category->nombre, 200);
                                break;
                            default:
                                $this->view->response(['La categoria no contiene = '.$params[':subrecurso']] , 404);
                                break;
                        }
                    }
                    else{
                        $this->view->response($category, 200);
                    }
                }
                else{
                    $this->view->response('El id categoria = ' .$params[':ID']. ' no existe', 404);
                }
            }
        }
    }