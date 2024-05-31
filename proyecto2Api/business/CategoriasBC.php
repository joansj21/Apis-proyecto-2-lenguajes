<?php
require_once '../data/CatagoriasDA.php';


class CategoriasBC {


    public function getAllCategorias() {
        $categoriasDA = new CategoriasDA();
        return $categoriasDA->getAllCategorias();
    }


}
?>