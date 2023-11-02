<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD Visita</title>
        <link rel="stylesheet" href="../../css/style.css">    
    </head>
    <body>
    <?php
        include '../../modelos/conexion/conexiondb.php';
        include '../../modelos/visita.php';
        
        if (isset($_GET['opcion'])) {
            $conexion = new Conexion();
            $opcion = $_GET['opcion']; 
            $objeto = new Visita($conexion->conexion);
            
            switch ($opcion) {
                case 'insert':
                    if (isset($_GET['id']) && isset($_GET['ip'])) {
                        $id = $_GET['id'];
                        $ip = $_GET['ip'];
                        $objeto->realizarVisita($id, $ip); 
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='../../vistas/visita/crud_visita.html'>Volver</a>";
                    } else {
                        echo "No se ha podido añadir la visita porque falta un campo";
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='../../vistas/visita/crud_visita.html'>Volver</a>";
                    }
                break;
                case 'delete':
                    if (isset($_GET['idVisita'])) {
                        $idVisita = $_GET['idVisita'];
                        echo "<h3>¿Seguro que quieres borrar la visita con id: " . $idVisita . "?</h3>";
                        echo "<a href='procesos.php?si=1&id=$idVisita'>Si</a><a href='procesos.php?si=2&id=$idVisita'>No</a>";
                    } else {
                        echo "No se ha podido borrar el visita porque falta un campo";
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='../../vistas/visita/crud_visita.html'>Volver</a>";
                    }
                break;
            }
        }
    ?>
    </body>
</html>
   
    