<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD Jesuitas</title>
        <link rel="stylesheet" href="../../css/style.css">   
    </head>
    <body>
    <?php
        include '../../modelos/conexion/conexiondb.php'; // Incluye el archivo de conexión a la base de datos.
        include '../../modelos/jesuita.php'; // Incluye el archivo que define la clase Jesuita.

        // Verifica si se ha enviado un formulario con la opción (acción) deseada.
        if (isset($_GET['opcion'])) {

            $conexion = new Conexion(); // Crea un objeto de la clase Conexion para establecer la conexión a la base de datos.
            $opcion = $_GET['opcion']; // Obtiene la opción (acción) del formulario.
            $objeto = new Jesuita($conexion->conexion); // Crea un objeto de la clase Jesuita y pasa la conexión como parámetro.

            // Realiza diferentes acciones según la opción seleccionada.
            switch ($opcion) {
                case 'insert':
                    if (isset($_GET['id']) && !empty($_GET['nombre']) && !empty($_GET['firma'])) {
                        $id = $_GET['id'];
                        $nombre = $_GET['nombre'];
                        $firma = $_GET['firma'];

                        $objeto->crear($id, $nombre, $firma); // Llama al método 'crear' de la clase Jesuita para añadir una fila. 
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='../../vistas/jesuita/crud_jesuita.html'>Volver</a>";
                    } else {
                        // Muestra un mensaje de error si faltan campos para la inserción.
                        echo "No se ha podido añadir el jesuita porque falta un campo";
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='../../vistas/jesuita/crud_jesuita.html'>Volver</a>";
                    }
                break;
                case 'update':
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $resultado = $objeto->consultar($id); // Llama al método 'consultar' de la clase Jesuita para obtener detalles del jesuita.
                        if ($resultado->num_rows > 0) {
                            $fila = $resultado->fetch_assoc();
                            $nombre = $fila['nombre'];
                            $firma = $fila['firma'];
                            
                            echo '<br><form method="GET" action="jesuita_actualizar_borrar.php">';
                            echo '<label for="nombre">Nombre:</label>';
                            echo '<input type="text" name="nombre" value="'.$nombre.'"><br>';
                            echo '<label for="firma">Firma:</label>';
                            echo '<input type="text" name="firma" value="'.$firma.'"><br>';
                            echo '<input type="hidden" name="opcion" value="update"><br><br>';
                            echo '<input type="hidden" name="id" value="'.$id.'"><br><br>';
                            echo '<input type="submit">';
                            echo '</form>';
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/jesuita/crud_jesuita.html'>Volver</a>";
                        } else{
                            echo "No se encontraron resultados.";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/jesuita/crud_jesuita.html'>Volver</a>";
                        }
                        $resultado->close();
                    } else {
                        // Muestra un mensaje de error si falta el campo 'id' para la actualización.
                        echo "No se ha podido modificar el jesuita porque falta un campo";
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='../../vistas/jesuita/crud_jesuita.html'>Volver</a>";
                    }
                break;
                case 'delete':
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        echo "<h3>¿Seguro que quieres borrar al jesuita con número de puesto: " . $id . "?</h3>";
                        echo "<a href='jesuita_actualizar_borrar.php?si=1&opcion=$opcion&id=$id'>Si</a><a href='jesuita_actualizar_borrar.php?si=0&opcion=$opcion'>No</a>";
                    } else {
                        // Muestra un mensaje de error si falta el campo 'id' para la eliminación.
                        echo "No se ha podido borrar el jesuita porque falta un campo";
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='../../vistas/jesuita/crud_jesuita.html'>Volver</a>";
                    }
                break;
            } 
        }
    ?>
    </body>
</html>
    