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
            if(isset($_POST['opcion'])){
                $conexion = new Conexion();
                $opcion = $_POST['opcion'];
                $objeto = new Lugar($conexion->conexion);
                switch($opcion){    
                    case 'update':
                        if(!empty($_POST['ip']) && !empty($_POST['lugar']) && !empty($_POST['desc'])){
                            $ip = $_POST['ip'];
                            $lugar = $_POST['lugar'];
                            $descripcion = $_POST['desc'];
                            $objeto->actualizar($ip,$lugar,$descripcion);
                        }else{
                            echo "No se ha podido modificar el lugar porque falta un campo";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/crud_lugar.html'>Volver</a>";
                        }
                        break;
                    case 'delete':
                        if(isset($_POST['si'])){
                        if(!empty($_POST['ip'])){
                                $ip = $_POST['ip'];
                                $objeto->eliminar($ip);
                            }else{
                                echo "No se ha podido borrar el lugar porque falta un campo";
                                echo "<br>";
                                echo "<br>";
                                echo "<a href='../../vistas/crud_lugar.html'>Volver</a>";
                            } 
                        }else{
                            echo "No se borró el lugar";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/crud_lugar.html'>Volver</a>";
                        } 
                        break;
                } 
            }
        }catch (mysqli_sql_exception){
            echo "Se perdió la conexión con la base de datos";
            echo "<br>";
            echo "<br>";
            echo "<a href='../../vistas/crud_lugar.html'>Volver</a>";
        }
    ?>
    </body>
</html>