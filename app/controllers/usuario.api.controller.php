<?php
    require_once 'app/controllers/api.controller.php';
    require_once 'app/models/usuario.model.php';
    require_once 'app/helpers/autenticar.api.helper.php';

    class UsuarioApiController extends ApiController {
        private $model;
        private $autenticarHelper;

        function __construct() {
            parent::__construct();
            $this->autenticarHelper = new AutenticarHelper();
            $this->model = new UsuarioModel();
        }
        function getToken($params = []) {
            $basic = $this->autenticarHelper->getAutenticarHeaders();// nos da el header 'authorization'  'basic:base64(usr:pass)

            if(empty($basic)) {
                $this->view->response('No envió encabezados de autenticación.', 401);
                return;
            }

            $basic = explode(" ", $basic); // ["Basic", "base64(usr:pass)"]

            if($basic[0]!="Basic") {
                $this->view->response('Los encabezados de autenticación son incorrectos.', 401);
                return;
            }

            $usuariopassword = base64_decode($basic[1]); //userpass
            $usuariopassword = explode(":", $usuariopassword); // ["usr" , "pass"]

            $user = $usuariopassword[0];
            $password = $usuariopassword[1];

            $usuariodata = [ "user" => $user, "id" => 123, "role" => 'ADMIN']; // Llamar a la DB

        
            $usuario = $this->model->getByEmail($user);
            if($usuario && $usuario->usuario == $user && password_verify($password, $usuario->contraseña)) {
                // Usuario es válido
                
                $token = $this->autenticarHelper->crearToken($usuariodata);
                $this->view->response($token);
            } else {
                $this->view->response('El usuario o contraseña son incorrectos.', 401);
            }
        }
    }
