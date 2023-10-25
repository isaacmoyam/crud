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
        }

        public function actualizar($id, $nombre, $firma) {
            $sql = "UPDATE jesuita SET nombre = '$nombre', firma = '$firma' WHERE idJesuita = $id";
            $this->conexion->query($sql);
        }

        public function eliminar($id) {
            $sql = "DELETE FROM jesuita WHERE idJesuita = $id";
            $this->conexion->query($sql);
        }
    }