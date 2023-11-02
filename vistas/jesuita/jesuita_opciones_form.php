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
        $opcion = $_GET['opcion'];

        switch($opcion){

            case 'insert':
                echo '<br><form method="GET" action="../../controladores/jesuita/jesuita_procesar_formulario.php">';
                echo '<label for="id">Número de puesto:</label>';
                echo '<input type="number" min="0" name="id"<br>';
                echo '<label for="nombre">Nombre:</label>';
                echo '<input type="text" name="nombre"<br>';
                echo '<label for="firma">Firma:</label>';
                echo '<input type="text" name="firma"><br>';
                echo '<input type="hidden" value="insert" name="opcion"><br><br>';
                echo '<input type="submit">';
                echo '</form>';
                echo "<br>";
                echo "<br>";
                echo "<a href='crud_jesuita.html'>Volver</a>";
            break;
            case 'update':
                echo '<br><form method="GET" action="../../controladores/jesuita/jesuita_procesar_formulario.php">';
                echo '<label for "id">Número de puesto:</label>';
                echo '<input type="number" min="0" name="id"<br>';
                echo '<input type="hidden" value="update" name="opcion"><br><br>';
                echo '<input type="submit">';
                echo '</form>';
                echo "<br>";
                echo "<br>";
                echo "<a href='crud_jesuita.html'>Volver</a>";
            break;
            case 'delete':
                echo '<br><form method="GET" action="../../controladores/jesuita/jesuita_procesar_formulario.php">';
                echo '<label for="id">Número de puesto:</label>';
                echo '<input type="number" min="0" name="id"<br>';
                echo '<input type="hidden" value="delete" name="opcion"><br><br>';
                echo '<input type="submit">';
                echo '</form>';
                echo "<br>";
                echo "<br>";
                echo "<a href='crud_jesuita.html'>Volver</a>";
            break;
            default:
                echo "Esa opción no existe";
            break;
        }
    ?>
    </body>
</html>
    