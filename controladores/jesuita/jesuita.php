<?php    
    class Jesuita {
        
        private $conexion;

        // Constructor de la clase que recibe una conexión a la base de datos como parámetro.
        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        public function consultar($id) {
            // Método para consultar un registro específico por su ID.
            $sql = "SELECT * FROM jesuita where idJesuita = $id";
            $resultado = $this->conexion->query($sql);
           
            return $resultado;
        }

        public function crear($id,$nombre, $firma) {
            // Método para agregar un nuevo registro.
            $sql = "INSERT INTO jesuita (idJesuita, nombre, firma) VALUES ('$id','$nombre', '$firma')";
            $resultado = $this->conexion->query($sql);
        }

        public function actualizar($id, $nombre, $firma) {
            // Método para actualizar un registro existente por su ID.
            $sql = "SELECT * FROM jesuita where idJesuita = $id";
            $result = $this->conexion->query($sql);
            if ($result->num_rows > 0) {
                $sql = "UPDATE jesuita SET nombre = '$nombre', firma = '$firma' WHERE idJesuita = $id";
                $resultado = $this->conexion->query($sql);
                return $resultado;
            }else{
                return 0;
            }
        }

        public function eliminar($id) {
            // Método para eliminar un registro por su ID.
            $sql = "SELECT * FROM jesuita where idJesuita = $id";
            $result = $this->conexion->query($sql);
            if ($result->num_rows > 0) {
                $sql = "DELETE FROM jesuita WHERE idJesuita = $id";
                $resultado = $this->conexion->query($sql);
                return $resultado;
            } else {
                return 0;
            }
        }
    }
?> 