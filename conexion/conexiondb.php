<?php
    include '../../config/configdb.php';

    class Conexion{
        public $conexion;
        public function __construct() {
            $this->conexion = new mysqli(HOST, USUARIO, CONTRASENA, BBDD);
            $this->conexion->set_charset("utf8");
            if ($this->conexion->connect_error) {
                die("Error de conexión: " . $this->conexion->connect_error);
            }
        }
    }
?>
   