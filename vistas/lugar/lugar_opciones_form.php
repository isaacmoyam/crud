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
        include '../../modelos/lugar.php'; // Incluye el archivo que define la clase Lugar.

        try {
            $conexion = new Conexion(); // Crea un objeto de la clase Conexion para establecer la conexión a la base de datos.
            $objeto = new Lugar($conexion->conexion); // Crea un objeto de la clase Lugar y pasa la conexión como parámetro.
            $opcion = $_GET['opcion']; // Recoge la opcion enviada por enlace.

            switch($opcion){
                // Si se recibe "insert" muestra un formulario para agregar un nuevo lugar.
                case 'insert':
                    echo '<br><form method="GET" action="../../controladores/lugar/lugar_procesar_formulario.php">';
                    echo '<label for="ip">Ip:</label>';
                    echo '<input type="text" name="ip"<br>';
                    echo '<label for="lugar">Lugar:</label>';
                    echo '<input type="text" name="lugar"<br>';
                    echo '<label for="desc">Descripción:</label>';
                    echo '<input type="text" name="desc"><br>';
                    echo '<input type="hidden" value="insert" name="opcion"><br>';
                    echo '<input type="submit">';
                    echo '</form>';
                    echo "<br>";
                    echo "<br>";
                    echo "<a href='crud_lugar.html'>Volver</a>";
                    break;
                case 'select':
                    // Si se recibe "select" llama al método "listar" del objeto para mostrar la lista de lugares.
                    $resultado = $objeto->listar();
                    if ($resultado->num_rows > 0) {
                        echo "<table border='2px'>";
                        echo "<tr>";
                        echo "<th>IP</th>";
                        echo "<th>LUGAR</th>";
                        echo "<th>DESCRIPCION</th>";
                        echo "<th></th>";
                        echo "</tr>";
                        while ($fila = $resultado->fetch_assoc()){
                            echo "<tr>";
                            $ip = $fila['ip'];
                            $lugar = $fila['lugar'];
                            $desc = $fila['descripcion'];
                            echo "<td>".$ip."</td>";
                            echo "<td>".$lugar."</td>";
                            echo "<td>".$desc."</td>";
                            echo "<td><a href='../../controladores/lugar/lugar_procesar_formulario.php?opcion=delete&ip=$ip'>🗑</a><a href='../../controladores/lugar/lugar_procesar_formulario.php?opcion=update&ip=$ip'>✍</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='crud_lugar.html'>Volver</a>";
                    } else {
                        echo "No se encontraron resultados.";
                        echo "<br>";
                        echo "<br>";
                        echo "<a href='crud_lugar.html'>Volver</a>";
                    }
                    $resultado->close();
                    break;
                default:
                    echo "Esa opción no existe";
                    break;
            }

        } catch (mysqli_sql_exception $e) {
            // Muestra un mensaje de error en caso de pérdida de conexión con la base de datos.
            echo "No se pudo conectar con la base de datos";
            echo "<br>";
            echo "<br>";
            echo "<a href='crud_lugar.html'>Volver</a>";
        }
    ?>
    </body>
</html>
    