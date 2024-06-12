<?php
require_once '../bd/BD.php';
require_once '../model/Cupon.php';

class empDA {

    public function updateEmpresa( $empresa, $id) {

        $nombre =$empresa->nombre;
        $cedula=$empresa->cedula;
        $direccion=$empresa->direccion;
        $fecha_creacion=$empresa->fecha_creacion;
        $telefono=$empresa->telefono;
        $contraseña=$empresa->contraseña;
        $temporal=$empresa->temporal;

      $query = "UPDATE empresas SET cedula='$cedula', direccion='$direccion', fecha_creacion='$fecha_creacion', clave_temporal='$temporal',nombre='$nombre', telefono='$telefono', contraseña='$contraseña' WHERE id='$id'";
      $queryAutoIncrement = "SELECT MAX(id) as id FROM empresas";
        
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
        $nombre =$empresa->nombre;
        $cedula=$empresa->cedula;
        $direccion=$empresa->direccion;
        $fecha_creacion=$empresa->fecha_creacion;
        $telefono=$empresa->telefono;
        $contraseña=$empresa->contraseña;
        $temporal=1;
        $activo=1;
        $correo=$empresa->correo;

        $query = "INSERT INTO empresas (nombre, cedula, direccion, fecha_creacion, correo, telefono, contraseña, activo, clave_temporal) 
        VALUES ('$nombre', '$cedula', '$direccion', '$fecha_creacion', '$correo', '$telefono', '$contraseña', '$activo', '$temporal')";
    
        $queryAutoIncrement = "SELECT MAX(id) as id FROM empresas";
    
        return metodoPost($query, $queryAutoIncrement);
    }

    public function updateEstado($id, $activo) {
        if ($activo == 1) {
            $activo = 0;
        } else {
            $activo = 1;
        }
        $query = "UPDATE empresas SET activo='$activo' WHERE id='$id'";
        return metodoPut($query);
    }
}

?>


