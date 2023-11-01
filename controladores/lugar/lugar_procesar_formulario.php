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
        
        if (isset($_GET['opcion'])) {
            $conexion = new Conexion(); // Crea un objeto de la clase Conexion para establecer la conexión a la base de datos.
            $opcion = $_GET['opcion']; // Obtiene la opción (acción) del formulario.
            $objeto = new Lugar($conexion->conexion); // Crea un objeto de la clase Lugar y pasa la conexión como parámetro.
            
            switch ($opcion) {
                case 'insert':
                    if (!empty($_GET['ip']) && !empty($_GET['lugar']) && !empty($_GET['desc'])) {
                        // Verifica si los campos necesarios no están vacíos.
                        $ip = $_GET['ip'];
                        $lugar = $_GET['lugar'];
                        $descripcion = $_GET['desc'];
                        try {
                            $objeto->crear($ip, $lugar, $descripcion); // El objeto llama al metodo crear() para insertar un nuevo lugar en la base de datos.
                            echo "El lugar ".$lugar." ha sido añadido correctamente";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
                        } catch (mysqli_sql_exception $e) {
                            // Muestra un mensaje de error si no se puede insertar el lugar (puede ser debido a duplicados).
                            echo "No se pudo insertar el lugar porque está repetido";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
                        }
                    } else {
                        // Muestra un mensaje de error si falta algún campo en el formulario.
                        echo "No se ha podido añadir el lugar porque falta un campo";
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
                    }
                    break;
                case 'update':
                    if (!empty($_GET['ip'])) {
                        // Verifica si el campo "ip" no está vacío.
                        $ip = $_GET['ip'];
                        $resultado = $objeto->consultar($ip); // Llama a consultar para consultar y actualizar un lugar.
                        if ($resultado->num_rows > 0) {
                            $fila = $resultado->fetch_assoc();
                            $lugar = $fila['lugar'];
                            $descripcion = $fila['descripcion'];
                            echo '<br><form method="GET" action="procesos.php">';
                            echo '<label for="nombre">Lugar:</label>';
                            echo '<input type="text" name="lugar" value="'.$lugar.'"><br>';
                            echo '<label for="firma">Descripción:</label>';
                            echo '<input type="text" name="desc" value="'.$descripcion.'"><br>';
                            echo '<input type="hidden" name="opcion" value="update"><br><br>';
                            echo '<input type="hidden" name="ip" value="'.$ip.'"><br>';
                            echo '<input type="submit">';
                            echo '</form>';
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
                        } else {
                            echo "No se encontraron resultados.";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
                        }
                        $resultado->close();
                    } else {
                        // Muestra un mensaje de error si falta el campo "ip" en el formulario.
                        echo "No se ha podido modificar el lugar porque falta un campo";
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
                    }
                    break;
                case 'delete':
                    if (!empty($_GET['ip'])) {
                        // Verifica si el campo "ip" no está vacío.
                        $ip = $_GET['ip'];
                        echo "<h3>¿Seguro que quieres borrar al lugar con ip: " . $ip . "?</h3>";
                        echo "<a href='procesos.php?si=1&opcion=$opcion&ip=$ip'>Si</a><a href='procesos.php?si=2&opcion=$opcion&ip=$ip'>No</a>";
                    } else {
                        // Muestra un mensaje de error si falta el campo "ip" en el formulario.
                        echo "No se ha podido borrar el lugar porque falta un campo";
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='../../vistas/lugar/crud_lugar.html'>Volver</a>";
                    }
                    break;
            }
        }
    ?>
    </body>
</html>
   
    