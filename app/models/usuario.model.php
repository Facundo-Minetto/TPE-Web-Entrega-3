<?php
    require_once 'app/models/model.php';

class UsuarioModel extends Model {
    public function getByEmail($email) {
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE usuario = ?');
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}