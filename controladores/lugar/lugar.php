<?php    
    // Definición de la clase Lugar
    class Lugar {
        
        private $conexion;

        // Constructor de la clase que recibe una conexión a la base de datos
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        // Función para listar todos los lugares en una tabla
        public function listar() {
            $sql = "SELECT * FROM lugar";
            $resultado = $this->conexion->query($sql);

            return $resultado;
        }

        // Función para consultar y mostrar un lugar específico para su actualización
        public function consultar($ip) {
            $sql = "SELECT * FROM lugar where ip = '$ip'";
            $resultado = $this->conexion->query($sql);

            return $resultado;
        }

        // Función para crear un nuevo lugar
        public function crear($ip, $lugar, $descripcion) {
            $sql = "INSERT INTO lugar (ip, lugar, descripcion) VALUES ('$ip','$lugar', '$descripcion')";
            $resultado = $this->conexion->query($sql);
        }

        // Función para actualizar un lugar existente
        public function actualizar($ip, $lugar, $descripcion) {
            $sql = "SELECT * FROM lugar where ip = '$ip'";
            $result = $this->conexion->query($sql);
            if ($result->num_rows > 0) {
                $sql = "UPDATE lugar SET lugar = '$lugar', descripcion = '$descripcion' WHERE ip = '$ip'";
                $resultado = $this->conexion->query($sql);
            }
        }

        // Función para eliminar un lugar
        public function eliminar($ip) {
            $sql = "SELECT * FROM lugar where ip = '$ip'";
            $resultado = $this->conexion->query($sql);
            if ($resultado->num_rows > 0) {
                $sql = "DELETE FROM lugar WHERE ip = '$ip'";
                $this->conexion->query($sql);
            } 
        }
    }
?>