<?php    
    // Definición de la clase Lugar
    class Lugar {
        
        private $conexion;

        // Constructor de la clase que recibe una conexión a la base de datos
        public function __construct($conexion) {
            try {
                $this->conexion = $conexion;
            } catch(mysqli_sql_exception $e) {
                echo "Hubo un problema al realizar la conexión con la base de datos.";
            }
        }

        // Función para listar todos los lugares en una tabla
        public function listar() {
            $sql = "SELECT * FROM lugar";
            $resultado = $this->conexion->query($sql);

            return $resultado;
        }

        // Función para consultar y mostrar un lugar específico para su actualización
        public function consultar($ip) {
            try {
                $sql = "SELECT * FROM lugar where ip = '$ip'";
                $resultado = $this->conexion->query($sql);
                return $resultado;
            } catch(mysqli_sql_exception $e) {
                echo "No se pudo consultar el lugar.";
            }
        }

        // Función para crear un nuevo lugar
        public function crear($ip, $lugar, $descripcion) {
            try {
                if(empty($descripcion)) {
                    $sql = "INSERT INTO lugar (ip, lugar, descripcion) VALUES ('$ip','$lugar', NULL)";
                } else {
                    $sql = "INSERT INTO lugar (ip, lugar, descripcion) VALUES ('$ip','$lugar', '$descripcion')";
                }
                $resultado = $this->conexion->query($sql);
                echo "El lugar ".$lugar." ha sido añadido correctamente";
            } catch(mysqli_sql_exception $e) {
                echo "No se pudo crear el lugar.";
            }
        }

        // Función para actualizar un lugar existente
        public function actualizar($ip, $lugar, $descripcion) {
            $result = $this->consultar($ip);
            try {
                if ($result->num_rows > 0) {
                    if(empty($descripcion)) {
                        $sql = "UPDATE lugar SET lugar = '$lugar', descripcion = NULL WHERE ip = '$ip'";
                    } else {
                        $sql = "UPDATE lugar SET lugar = '$lugar', descripcion = '$descripcion' WHERE ip = '$ip'";
                    }
                    $resultado = $this->conexion->query($sql);
                    return $resultado;
                } else {
                    return 0;
                }
            } catch(mysqli_sql_exception $e) {
                echo "No se pudo actualizar el lugar.";
            }
        }

        // Función para eliminar un lugar
        public function eliminar($ip) {
            $result = $this->consultar($ip);
            try {
                if ($result->num_rows > 0) {
                    $sql = "DELETE FROM lugar WHERE ip = '$ip'";
                    $resultado = $this->conexion->query($sql);
                    return $resultado;
                } else {
                    return 0;
                }
            } catch(mysqli_sql_exception $e) {
                echo "No se pudo borrar al jesuita.";
            }
        }
    }
?>