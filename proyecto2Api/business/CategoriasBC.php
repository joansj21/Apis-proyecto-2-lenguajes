<?php
require_once '../data/CatagoriasDA.php';


class CategoriasBC {


    public function getAllCategorias() {
        $categoriasDA = new CategoriasDA();
        return $categoriasDA->getAllCategorias();
    }
   
    public function insertCategoria($nombre) {
        $categoriasDA = new CategoriasDA();
        return $categoriasDA->insertCategoria($nombre);
    }

    public function updateCategoria($nombre,$id) {
        $categoriasDA = new CategoriasDA();
        return $categoriasDA->updateCategoria($nombre,$id);
    }

}
?>