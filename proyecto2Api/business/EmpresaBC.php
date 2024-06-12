<?php
require_once '../data/EmpresaDA.php';
require_once '../model/Empresa.php';
include '../business/validation/validationEmpresa.php';


class EmpresaBC {

    public function login($correo) {
        $empresaDA = new EmpresaDA();
        return $empresaDA->login($correo);
    }

    public function updateEmpresa($empresa, $id) {
        // Validar los campos
     $mensajeError = validarCampos($empresa);
 
     // Si hay un mensaje de error, devolverlo
     if ($mensajeError !== "") {
         return ['error' => $mensajeError];
     }
 
     // Si no hay errores, proceder con la actualización
     $empresaDA = new EmpresaDA();
     return $empresaDA->updateEmpresa($empresa, $id);
 
 
     }
  
    public function getEmpresa($id) {
        $empresaDA = new EmpresaDA();
        return $empresaDA->getEmpresa($id);
    }

    public function addEmpresa($empresa) {
        $mensajeError = validarCampos($empresa);

        if ($mensajeError !== "") {
            return ['error' => $mensajeError];
        }
    
        $empresaDA = new EmpresaDA();

        
        return $empresaDA->insertEmpresa($empresa);
    }
    public function getAllEmpresas() {
        $empresaDA = new EmpresaDA();
        return $empresaDA->getAllmpresas();
    }
}
?>