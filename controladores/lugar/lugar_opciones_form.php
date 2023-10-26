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
            $conexion = new Conexion(); // Crea un objeto de la clase Conexion para establecer la conexión a la base de datos.
            $objeto = new Lugar($conexion->conexion); // Crea un objeto de la clase Lugar y pasa la conexión como parámetro.

            if (isset($_GET['insert'])) {
                // Si se recibe un parámetro "insert" muestra un formulario para agregar un nuevo lugar.
                echo '<br><form method="POST" action="lugar_procesar_formulario.php">';
                echo '<label for="ip">Ip:</label>';
                echo '<input type="text" name="ip"<br>';
                echo '<label for="lugar">Lugar:</label>';
                echo '<input type="text" name="lugar"<br>';
                echo '<label for="desc">Descripción:</label>';
                echo '<input type="text" name="desc"><br>';
                echo '<input type="hidden" value="insert" name="opcion"><br>';
                echo '<input type="submit">';
                echo '</form>';
            }

            if (isset($_GET['select'])) {
                // Si se recibe un parámetro "select" llama al método "listar" del objeto para mostrar la lista de lugares.
                $objeto->listar();
            }

            if (isset($_GET['update'])) {
                // Si se recibe un parámetro "update" muestra un formulario para actualizar un lugar.
                echo '<br><form method="POST" action="lugar_procesar_formulario.php">';
                echo '<label for="ip">Ip:</label>';
                echo '<input type="text" name="ip"><br>';
                echo '<input type="hidden" value="update" name="opcion"><br>';
                echo '<input type="submit">';
                echo '</form>';
            }

            if (isset($_GET['delete'])) {
                // Si se recibe un parámetro "delete" muestra un formulario para eliminar un lugar.
                echo '<br><form method="POST" action="lugar_procesar_formulario.php">';
                echo '<label for="nombre">Ip:</label>';
                echo '<input type="text" name="ip"<br>';
                echo '<input type="hidden" value="delete" name="opcion"><br><br>';
                echo '<input type="submit">';
                echo '</form>';
            }
        } catch (mysqli_sql_exception $e) {
            // Muestra un mensaje de error en caso de pérdida de conexión con la base de datos.
            echo "No se pudo conectar con la base de datos";
            echo "<br>";
            echo "<br>";
            echo "<a href='../../vistas/crud_lugar.html'>Volver</a>";
        }
    ?>
    </body>
</html>
    