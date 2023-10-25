<?php    
    class Jesuita {
        
        private $conexion;

        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        public function listar() {
            $sql = "SELECT * FROM jesuita";
            $resultado = $this->conexion->query($sql);
            if ($resultado->num_rows > 0) {
                echo "<table border='2px'>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>NOMBRE</th>";
                echo "<th>FIRMA</th>";
                echo "</tr>";
                while ($fila = $resultado->fetch_assoc()){
                    echo "<tr>";
                    $id = $fila['idJesuita'];
                    $nombre = $fila['nombre'];
                    $firma = $fila['firma'];
                    echo "<td>".$id."</td>";
                    echo "<td>".$nombre."</td>";
                    echo "<td>".$firma."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }else{
                echo "No se encontraron resultados.";
            }
            
            $resultado->close();
        }

        public function crear($id,$nombre, $firma) {
            $sql = "INSERT INTO jesuita (idJesuita, nombre, firma) VALUES ('$id','$nombre', '$firma')";
            $this->conexion->query($sql);
            echo "El jesuita ".$nombre." ha sido añadido correctamente"; 
        }

        public function actualizar($id, $nombre, $firma) {
            $sql = "SELECT * FROM jesuita where idJesuita = $id";
            $resultado = $this->conexion->query($sql);
            if ($resultado->num_rows > 0) {
                $sql = "UPDATE jesuita SET nombre = '$nombre', firma = '$firma' WHERE idJesuita = $id";
                $this->conexion->query($sql);
                echo "El jesuita ".$nombre." ha sido actualizado correctamente";
            }else{
                echo "No puedes actualizar un jesuita que no existe";
            }
        }

        public function eliminar($id) {
            $sql = "SELECT * FROM jesuita where idJesuita = $id";
            $resultado = $this->conexion->query($sql);
            if ($resultado->num_rows > 0) {
                $sql = "DELETE FROM jesuita WHERE idJesuita = $id";
                $this->conexion->query($sql);
                echo "El jesuita ha sido borrado correctamente";
            }else{
                echo "No puedes borrar un jesuita que no existe";
            }
        }
    }