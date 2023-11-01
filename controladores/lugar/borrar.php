<?php
    include '../../modelos/conexion/conexiondb.php'; // Incluye el archivo de conexión a la base de datos.
    include '../../modelos/lugar.php'; // Incluye el archivo que define la clase Lugar.

    $conexion = new Conexion(); // Crea un objeto de la clase Conexion para establecer la conexión a la base de datos.
    $objeto = new Lugar($conexion->conexion); // Crea un objeto de la clase Lugar y pasa la conexión como parámetro.

    if (isset($_GET['si'])) {
        $si = $_GET['si'];

        if ($si == 1) {
            if(!empty($_GET['ip'])){
                $ip = $_GET['ip'];
                $objeto->eliminar($ip);
                echo "El lugar ha sido borrado correctamente";
                echo "<br>";
                echo "<br>";
                echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
            } elseif ($si == 2) {
                echo "No se ha podido borrar el lugar porque falta un campo";
                echo "<br>";
                echo "<br>";
                echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
            } else {
                echo "Valor no válido";
            }
        } else {
            // Muestra un mensaje si no se confirma la eliminación.
            echo "No se borró el lugar";
            echo "<br>";
            echo "<br>";
            echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
        }
    }
?>