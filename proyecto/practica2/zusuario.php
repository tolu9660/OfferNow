<?php
class usuario{
    
    private $id;
    private $nombreUsuario;
    private $nombre;
    private $password;
    private $rol;

    private function __construct($nombreUsuario, $nombre, $password, $rol){
        $this->nombreUsuario= $nombreUsuario;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->rol = $rol;
    }

}
?>