<?php
class Empresa {
    public $id;
    public $nombre;
    public $cedula;
    public $direccion;
    public $fecha_creacion;
    public $telefono;
    public $contraseña;
    public $temporal;
    public $activo;

    public function __construct($id = null, $nombre = null, $cedula = null, $direccion = null, $fecha_creacion = null, $telefono = null, $contraseña = null, $temporal = null, $activo = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->cedula = $cedula;
        $this->direccion = $direccion;
        $this->fecha_creacion = $fecha_creacion;
        $this->telefono = $telefono;
        $this->contraseña = $contraseña;
        $this->temporal = $temporal;
        $this->activo = $activo;
    }

   

    // Constructor para inicializar las propiedades


}
?>
