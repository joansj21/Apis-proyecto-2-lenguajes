<?php
require_once '../data/empDA.php';
require_once '../model/Empresa.php';
include '../business/validation/validationEmpresa.php';

class empBC {


    public function updateEmpresa($id,$nombre,$cedula,$direccion,$fecha_creacion,$telefono,$contraseña,$correo) {
       // Validar los campos
 

    // Si no hay errores, proceder con la actualización
    $empresaDA = new empDA();
    return $empresaDA->updateEmpresa($id,$nombre,$cedula,$direccion,$fecha_creacion,$telefono,$contraseña,$correo);


    }


    public function insertEmpresa($empresa) {
        // Validar los campos
     $mensajeError = validarCamposInsert($empresa);
 
     // Si hay un mensaje de error, devolverlo
     if ($mensajeError !== "") {
         return ['error' => $mensajeError];
     }
 
     // Si no hay errores, proceder con la actualización
     $empresaDA = new empDA();
     return $empresaDA->insertEmpresa($empresa);
 
 
     }
     public function getAllEmpresas() {
        $empresaDA = new empDA();
        return $empresaDA->getAllmpresas();
    }

    public function updateEstado($id, $activo)
    {
        $empresaDA = new empDA();
        return $empresaDA->updateEstado($id, $activo);
    }

}
?>