<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD Lugar</title>
        <link rel="stylesheet" href="../../css/style.css">    
    </head>
    <body>
    <?php
        include '../../modelos/conexion/conexiondb.php'; // Incluye el archivo de conexión a la base de datos.
        include '../../modelos/lugar.php'; // Incluye el archivo que define la clase Lugar.

        try {
            if (isset($_GET['opcion'])) {
                
                $conexion = new Conexion(); // Crea un objeto de la clase Conexion para establecer la conexión a la base de datos.
                $opcion = $_GET['opcion']; // Obtiene la opción (acción) del formulario.
                $objeto = new Lugar($conexion->conexion); // Crea un objeto de la clase Lugar y pasa la conexión como parámetro.

                // Realiza diferentes acciones según la opción seleccionada.
                switch ($opcion) {
                    case 'update':
                        if (!empty($_GET['ip']) && !empty($_GET['lugar']) && !empty($_GET['desc'])) {
                            // Verifica si los campos necesarios no están vacíos.
                            $ip = $_GET['ip'];
                            $lugar = $_GET['lugar'];
                            $descripcion = $_GET['desc'];
                            $objeto->actualizar($ip, $lugar, $descripcion);
                            echo "El lugar ".$lugar." ha sido actualizado correctamente";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
                        } else {
                            // Muestra un mensaje de error si falta algún campo.
                            echo "No se ha podido modificar el lugar porque falta un campo";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
                        }
                        break;
                    case 'delete':
                        if ($_GET['si']== 1) {
                            if (!empty($_GET['ip'])) {
                                // Verifica si se ha confirmado la eliminación y el campo 'ip' no está vacío.
                                $ip = $_GET['ip'];
                                $objeto->eliminar($ip);
                                echo "El lugar ha sido borrado correctamente";
                                echo "<br>";
                                echo "<br>";
                                echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
                            } else {
                                // Muestra un mensaje de error si falta algún campo.
                                echo "No se ha podido borrar el lugar porque falta un campo";
                                echo "<br>";
                                echo "<br>";
                                echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
                            }
                        } else {
                            // Muestra un mensaje si no se confirma la eliminación.
                            echo "No se borró el lugar";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
                        }
                        break;
                } 
            }
        } catch (mysqli_sql_exception $e) {
            // Muestra un mensaje de error en caso de pérdida de conexión con la base de datos.
            echo "Se perdió la conexión con la base de datos";
            echo "<br>";
            echo "<br>";
            echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
        }
    ?>
    </body>
</html>