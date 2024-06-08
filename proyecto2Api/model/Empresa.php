<?php
class Empresa {
    public $nombre;
    public $cedula;
    public $direccion;
    public $fecha_creacion;
    public $telefono;
    public $contraseña;
    public $temporal;
    public $correo;


    public function __construct($nombre, $cedula, $direccion, $fecha_creacion, $telefono, $contraseña, $temporal,$correo) {
        $this->nombre = $nombre;
        $this->cedula = $cedula;
        $this->direccion = $direccion;
        $this->fecha_creacion = $fecha_creacion;
        $this->telefono = $telefono;
        $this->contraseña = $contraseña;
        $this->temporal = $temporal;
        $this->correo = $correo;
    }
}
?>
