<?php
    include '../../modelos/conexion/conexiondb.php';
    include '../../modelos/visita.php';

    $conexion = new Conexion();
    $objeto = new Visita($conexion->conexion);

    if (isset($_GET['si'])) {
        $si = $_GET['si'];

        if ($si == 1) {
            if(!empty($_GET['idVisita'])){
                $idVisita = $_GET['idVisita'];
                $objeto->eliminar($idVisita);
                echo "<br>";
                echo "<br>";
                echo "<a href='../../vistas/visita/crud_visita.html'>Volver</a>";
            } else if ($si == 2) {
                echo "No se ha podido borrar la visita porque falta un campo";
                echo "<br>";
                echo "<br>";
                echo "<a href='../../vistas/visita/crud_visita.html'>Volver</a>";
            } else {
                echo "Valor no válido";
            }
        } else {
            // Muestra un mensaje si no se confirma la eliminación.
            echo "No se borró la visita";
            echo "<br>";
            echo "<br>";
            echo "<a href='../../vistas/visita/crud_visita.html'>Volver</a>";
        }
    }
?>