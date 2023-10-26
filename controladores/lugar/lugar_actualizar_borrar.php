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
        include '../../conexion/conexiondb.php'; // Incluye el archivo de conexión a la base de datos.
        include 'lugar.php'; // Incluye el archivo que define la clase Lugar.

        try {
            if (isset($_POST['opcion'])) {
                
                $conexion = new Conexion(); // Crea un objeto de la clase Conexion para establecer la conexión a la base de datos.
                $opcion = $_POST['opcion']; // Obtiene la opción (acción) del formulario.
                $objeto = new Lugar($conexion->conexion); // Crea un objeto de la clase Lugar y pasa la conexión como parámetro.

                // Realiza diferentes acciones según la opción seleccionada.
                switch ($opcion) {
                    case 'update':
                        if (!empty($_POST['ip']) && !empty($_POST['lugar']) && !empty($_POST['desc'])) {
                            // Verifica si los campos necesarios no están vacíos.
                            $ip = $_POST['ip'];
                            $lugar = $_POST['lugar'];
                            $descripcion = $_POST['desc'];
                            $objeto->actualizar($ip, $lugar, $descripcion);
                        } else {
                            // Muestra un mensaje de error si falta algún campo.
                            echo "No se ha podido modificar el lugar porque falta un campo";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/crud_lugar.html'>Volver</a>";
                        }
                        break;
                    case 'delete':
                        if (isset($_POST['si'])) {
                            if (!empty($_POST['ip'])) {
                                // Verifica si se ha confirmado la eliminación y el campo 'ip' no está vacío.
                                $ip = $_POST['ip'];
                                $objeto->eliminar($ip);
                            } else {
                                // Muestra un mensaje de error si falta algún campo.
                                echo "No se ha podido borrar el lugar porque falta un campo";
                                echo "<br>";
                                echo "<br>";
                                echo "<a href='../../vistas/crud_lugar.html'>Volver</a>";
                            }
                        } else {
                            // Muestra un mensaje si no se confirma la eliminación.
                            echo "No se borró el lugar";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/crud_lugar.html'>Volver</a>";
                        }
                        break;
                } 
            }
        } catch (mysqli_sql_exception $e) {
            // Muestra un mensaje de error en caso de pérdida de conexión con la base de datos.
            echo "Se perdió la conexión con la base de datos";
            echo "<br>";
            echo "<br>";
            echo "<a href='../../vistas/crud_lugar.html'>Volver</a>";
        }
    ?>
    </body>
</html>