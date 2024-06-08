<?php
require_once '../bd/BD.php';
require_once '../model/Cupon.php';

class EmpresaDA {


    public function login($correo) {

        $query = "SELECT * FROM empresas WHERE correo='$correo' and activo = 1";
        
        return metodoGet($query);
    }



    public function updateEmpresa( $empresa, $id) {

        $nombre =$empresa->nombre;
        $cedula=$empresa->cedula;
        $direccion=$empresa->direccion;
        $fecha_creacion=$empresa->fecha_creacion;
        $telefono=$empresa->telefono;
        $contraseña=$empresa->contraseña;
        $temporal=$empresa->temporal;

      $query = "UPDATE empresas SET cedula='$cedula', direccion='$direccion', fecha_creacion='$fecha_creacion', clave_temporal='$temporal',nombre='$nombre', telefono='$telefono', contraseña='$contraseña' WHERE id='$id'";
        
        return $resultado = metodoPut($query, $queryAutoIncrement);
    }


    public function getEmpresa($id) {
        $query = "SELECT * FROM empresas WHERE id='$id'";
        return metodoGet($query);
    }

    public function getAllmpresas() {
        $query = "SELECT * FROM empresas";
        return metodoGet($query);
    }

    
    public function insertEmpresa($empresa) {
        $nombre = $empresa->getNombre();
        $cedula = $empresa->getCedula();
        $direccion = $empresa->getDireccion();
        $fecha_creacion = $empresa->getFechaCreacion();
        $correo = $empresa->getCorreo();
        $telefono = $empresa->getTelefono();
        $contraseña = $empresa->getContraseña();
        $clave_temporal = $empresa->getClaveTemporal();
        $activo = $empresa->getActivo();
    
        $query = "INSERT INTO empresas(nombre, cedula, direccion, fecha_creacion, correo, telefono, contraseña, clave_temporal, activo) 
                  VALUES ('$nombre', '$cedula', '$direccion', '$fecha_creacion', '$correo', '$telefono', '$contraseña', '$clave_temporal', '$activo')";
        $queryAutoIncrement = "SELECT MAX(id) as id FROM empresas";
    
        return metodoPost($query, $queryAutoIncrement);
    }
    
}


?>


