<?php
    class Configuracion {
        
        /* HOST
        private $host = "2daw.esvirgua.com";
        private $usuario = "user2daw_11";
        private $contrasena = "";
        private $basededatos = "user2daw_BD1-11";
        */
        
        private $host = "localhost";
        private $usuario = "root";
        private $contrasena = "";
        private $basededatos = "jesuitas";

        public $conexion;

        public function __construct() {
            $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->basededatos);
            $this->conexion->set_charset("utf8");
            if ($this->conexion->connect_error) {
                die("Error de conexión: " . $this->conexion->connect_error);
            }
        }
    }