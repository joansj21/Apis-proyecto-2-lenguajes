<?php
require_once '../bd/BD.php';
require_once '../model/Cupon.php';


class EmpDA {
    public function getAllEmpresas() {
        $query = "SELECT * FROM empresas";
        $stmt = metodoGet($query); // Obtener el objeto PDOStatement
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtener todos los resultados como un arreglo asociativo
    }



    public function addEmpresa($empresa) {
        $nombre =$empresa->nombre;
        $cedula=$empresa->cedula;
        $direccion=$empresa->direccion;
        $fecha_creacion=$empresa->fecha_creacion;
        $telefono=$empresa->telefono;
        $contraseña=$empresa->contraseña;
        $temporal=$empresa->temporal;
        $query = "INSERT INTO empresas (cedula, direccion, fecha_creacion, clave_temporal, nombre, telefono, contraseña) VALUES ('$cedula', '$direccion', '$fecha_creacion', '$temporal', '$nombre', '$telefono', '$contraseña')";
        return $resultado = metodoPost($query, $queryAutoIncrement);
    }

 


}


?>


