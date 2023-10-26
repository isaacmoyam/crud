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
        include '../../conexion/conexiondb.php';
        include 'lugar.php';

        try{ 
            $conexion = new Conexion();
            $objeto = new Lugar($conexion->conexion);
            
            if(isset($_GET['insert'])){
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
        
            if(isset($_GET['select'])){
                $objeto->listar();
            }
        
            if(isset($_GET['update'])){
                echo '<br><form method="POST" action="lugar_procesar_formulario.php">';
                echo '<label for="ip">Ip:</label>';
                echo '<input type="text" name="ip"><br>';
                echo '<input type="hidden" value="update" name="opcion"><br>';
                echo '<input type="submit">';
                echo '</form>';
            }
        
            if(isset($_GET['delete'])){
                echo '<br><form method="POST" action="lugar_procesar_formulario.php">';
                echo '<label for="nombre">Ip:</label>';
                echo '<input type="text" name="ip"<br>';
                echo '<input type="hidden" value="delete" name="opcion"><br><br>';
                echo '<input type="submit">';
                echo '</form>';
            }
        } catch (mysqli_sql_exception $e) {
            echo "No se pudo conectar con la base de datos";
            echo "<br>";
            echo "<br>";
            echo "<a href='../../vistas/crud_lugar.html'>Volver</a>";
        }
    ?>
    </body>
</html>
    