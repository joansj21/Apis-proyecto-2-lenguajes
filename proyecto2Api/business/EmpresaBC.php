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
        $empresaDA = new EmpresaDA();

        
        return $empresaDA->insertEmpresa($empresa);
    }
    public function getAllEmpresas() {
        $empresaDA = new EmpresaDA();
        return $empresaDA->getAllmpresas();
    }
}
?>