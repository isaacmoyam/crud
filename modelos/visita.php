<?php    
    // Definición de la clase Visita
    class Visita {
        
        private $conexion;

        // Constructor de la clase que recibe una conexión a la base de datos
        public function __construct($conexion) {
            try {
                $this->conexion = $conexion;
            } catch(mysqli_sql_exception $e) {
                echo "Hubo un problema al realizar la conexión con la base de datos.";
            }
        }

        public function listar() {
            $sql = "SELECT * FROM visita";
            $resultado = $this->conexion->query($sql);
            return $resultado;
        }

        public function consultar($idVisita) {
            try {
                $sql = "SELECT * FROM visita where idVisita = '$idVisita'";
                $resultado = $this->conexion->query($sql);
                return $resultado;
            } catch(mysqli_sql_exception $e) {
                echo "No se pudo consultar el lugar.";
            }
        }

        public function realizarVisita($id, $ip) {
            try {
                $sql = "INSERT INTO visita (idJesuita,ip) VALUES ('$id','$ip')";
                $resultado = $this->conexion->query($sql);
                echo "La visita ha sido realizada correctamente";
            } catch(mysqli_sql_exception $e) {
                echo "No se realizó la visita.";
            }
        }

        public function eliminar($id) {
            $result = $this->consultar($id);
            try {
                if ($result->num_rows > 0) {
                    $sql = "DELETE FROM visita WHERE idVisita = '$id'";
                    $resultado = $this->conexion->query($sql);
                    echo "El lugar ha sido borrado correctamente";
                    return $resultado;
                } else {
                    return 0;
                }
            } catch(mysqli_sql_exception $e) {
                echo "No se pudo borrar la visita.";
            }
        }
    }
?>