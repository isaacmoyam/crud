<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD Lugar</title>
        <link rel="stylesheet" href="../style.css">  
    </head>
    <body>
    <?php
        include '../config.php';
        include 'Lugar.php';

        
            if(isset($_POST['opcion'])){
                $conexion = new Configuracion();
                $opcion = $_POST['opcion'];
                $objeto = new Lugar($conexion->conexion);
                switch($opcion){
                    case 'insert':
                        if(!empty($_POST['ip']) && !empty($_POST['lugar']) && !empty($_POST['desc'])){
                            $ip = $_POST['ip'];
                            $lugar = $_POST['lugar'];
                            $descripcion = $_POST['desc'];
                            try{
                            $objeto->crear($ip,$lugar,$descripcion);
                            }catch(mysqli_sql_exception){
                                echo"No se pudo insertar al lugar porque está repetido";
                            }
                        }else{
                            echo "No se ha podido añadir el lugar porque falta un campo";
                        }
                        break;
                    case 'update':
                        if(!empty($_POST['ip'])){
                            $ip = $_POST['ip'];
                            $objeto->consultar($ip);
                        }else{
                            echo "No se ha podido modificar el lugar porque falta un campo";
                        }
                        break;
                    case 'delete':
                        if(!empty($_POST['ip'])){
                            $ip = $_POST['ip'];
                            echo "<h3>¿Seguro que quieres borrar al lugar con ip: ".$ip."?</h3>";
                            echo "<form action='actualizar_borrar.php' method='POST'>";
                            echo "<input type='submit' name='si' value='Si'>";
                            echo "<input type='submit' name='no' value='No'>";
                            echo '<input type="hidden" name="opcion" value="delete"><br><br>';
                            echo '<input type="hidden" name="ip" value="'.$ip.'"><br>';
                            echo "</form>";
                        }else{
                            echo "No se ha podido borrar el lugar porque falta un campo";
                        }
                        break;
                } 
            }
    ?>
    </body>
</html>
   
    