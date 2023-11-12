<?php
require_once 'app/controllers/api.controller.php';
require_once 'app/helpers/autenticar.api.helper.php';
require_once 'app/models/product.model.php';

class productApiController extends ApiController
{

    private $model;
    private $authHelper;

    function __construct()
    {
        parent::__construct();
        $this->model = new productModel();
        $this->authHelper = new AutenticarHelper();
    }

    function getProducts($params = [])
    {
        /*$user = $this->authHelper->UsuarioActual();
            if(!$user){
                $this->view->response('Unauthorized', 401);
                return;
            }
            if($user->role!='ADMIN'){
                $this->view->response('Forbidden', 403);
                return;
            }*/

        if (empty($params)) {
            if (isset($_GET['sort']) && isset($_GET['order'])) {
                $sort = $_GET['sort'];
                $order = $_GET['order'];
                switch ($sort) {
                    case 'precio':
                        $sort = 'precio';
                        break;
                    case 'id_producto':
                        $sort = 'id_producto';
                        break;
                    case 'id_categoria':
                        $sort = 'id_categoria';
                        break;
                    default:
                        $this->view->response('Registro ' . $sort . ' incorrecto', 404);
                        break;
                }
                if ($order !== 'desc') {
                    $order = 'asc';
                } else {
                    $order = 'desc';
                }
                
                $adicional = 'ORDER BY ' . $sort . ' ' . $order;

            } else {
                $adicional = '';
            }

        $lista= $this->model->ListProduc($adicional);
        $this->view->response($lista, 200);
            
        } else if(isset($params)){
            $product = $this->model->getProduct($params[':ID']);
            if (!empty($product)) {
                if ($params[':subrecurso']) {
                    switch ($params[':subrecurso']) {
                        case 'precio':
                            $this->view->response($product->precio, 200);
                            break;
                        case 'nombre_producto':
                            $this->view->response($product->nombre_producto, 200);
                            break;
                        default:
                            $this->view->response(['El producto no contiene = ' . $params[':subrecurso']], 404);
                            break;
                    }
                } else {
                    $this->view->response($product, 200);
                }
            } else {
                $this->view->response(['El producto con el id = ' . $params[':ID'] . ' no existe'], 404);
            }
        }
    }
}
