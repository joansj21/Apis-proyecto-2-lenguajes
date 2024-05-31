<?php
class Categoria {
    public $id;
    public $nombre;
   

    // Constructor para inicializar las propiedades
    public function __construct($nombre, $id) {
        $this->nombre = $nombre;
        $this->id = $id;
   
    }

}
?>
