<?php
require_once 'model.php';

class productModel extends Model {
    
    function getProducts() {
        $query = $this->db->prepare('SELECT * FROM products');
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }
    function getCategorys(){
        $query = $this->db->prepare('SELECT * FROM categorys');
        $query->execute();

        $categorys = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorys;
    }
    function getProduct($id){
        $query = $this->db->prepare('SELECT * FROM products WHERE id_producto = ?');
        $query->execute([$id]);

        //product es un producto solo
        $product = $query->fetch(PDO::FETCH_OBJ);

        return $product;
    }
    function getProductosOrdenados($order, $sort){
        $query = $this->db->prepare('SELECT * FROM products ORDER BY $sort $order');
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }
    function ListProduc($adicional) {
        $query = $this->db->prepare("SELECT id_producto, precio, id_categoria FROM products $adicional;");
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;//para que se pueda incluir 
    }
    



}