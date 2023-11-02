<?php    
    class Jesuita {
        
        private $conexion;

        // Constructor de la clase que recibe una conexión a la base de datos como parámetro.
        public function __construct($conexion) {
            try {
                $this->conexion = $conexion;
            } catch(mysqli_sql_exception $e) {
                echo "Hubo un problema al realizar la conexión con la base de datos.";
            }
        }

        public function listar() {
            $sql = "SELECT * FROM jesuita";
            $resultado = $this->conexion->query($sql);
            return $resultado;
        }

        public function consultar($id) {
            // Método para consultar un registro específico por su ID.
            try {
                $sql = "SELECT * FROM jesuita where idJesuita = $id";
                $resultado = $this->conexion->query($sql);
                return $resultado;
            } catch(mysqli_sql_exception $e) {
                echo "No se pudo consultar el jesuita.";
            }
        }

        public function crear($id,$nombre, $firma) {
            // Método para agregar un nuevo registro.
            try {
                $sql = "INSERT INTO jesuita (idJesuita, nombre, firma) VALUES ('$id','$nombre', '$firma')";
                $resultado = $this->conexion->query($sql);
                echo "El jesuita ".$nombre." ha sido añadido correctamente";
            } catch(mysqli_sql_exception $e) {
                echo "No se pudo crear al jesuita.";
            }
        }

        public function actualizar($id, $nombre, $firma) {
            // Método para actualizar un registro existente por su ID.
            $result = $this->consultar($id);
            try {
                if ($result->num_rows > 0) {
                    $sql = "UPDATE jesuita SET nombre = '$nombre', firma = '$firma' WHERE idJesuita = $id";
                    $resultado = $this->conexion->query($sql);
                    return $resultado;
                } else {
                    return 0;
                }
            } catch(mysqli_sql_exception $e) {
                echo "No se pudo actualizar al jesuita.";
            }
        }

        public function eliminar($id) {
            // Método para eliminar un registro por su ID.
            $result = $this->consultar($id);
            try {
                if ($result->num_rows > 0) {
                    $sql = "DELETE FROM jesuita WHERE idJesuita = $id";
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