<?php
require_once '../data/EmpresaDA.php';
require_once '../model/Empresa.php';

class EmpresaBC {

    public function login($correo) {
        $empresaDA = new EmpresaDA();
        return $empresaDA->login($correo);
    }

    public function updateEmpresa($empresa,$id) {
        $empresaDA = new EmpresaDA();
        return $empresaDA->updateEmpresa($empresa,$id);
    }
  
    public function getEmpresa($id) {
        $empresaDA = new EmpresaDA();
        return $empresaDA->getEmpresa($id);
    }

    public function addEmpresa($empresa) {
        echo json_encode($empresa);

        $empresaDA = new EmpresaDA();
        return $empresaDA->addEmpresa($empresa);
     
    }


}
?>