<?php
    class Configuracion {
        
        private $host = "localhost";
        private $usuario = "root";
        private $contrasena = "";
        private $basededatos = "jesuitas";
        public $conexion;

        public function __construct() {
            $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->basededatos);
            if ($this->conexion->connect_error) {
                die("Error de conexión: " . $this->conexion->connect_error);
            }
        }
    }