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
        include '../../conexion/conexiondb.php';
        include 'jesuita.php';

        try{
            if(isset($_POST['opcion'])){
                $conexion = new Conexion();
                $opcion = $_POST['opcion'];
                $objeto = new Jesuita($conexion->conexion);
                switch($opcion){    
                    case 'update':
                        if(isset($_POST['id']) && !empty($_POST['nombre']) && isset($_POST['firma'])){
                            $id = $_POST['id'];
                            $nombre = $_POST['nombre'];
                            $firma = $_POST['firma'];
                            $objeto->actualizar($id,$nombre,$firma);
                        }else{
                            echo "No se ha podido modificar el jesuita porque falta un campo";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/crud_jesuita.html'>Volver</a>";
                        }
                        break;
                    case 'delete':
                        if(isset($_POST['si'])){
                        if(isset($_POST['id'])){
                                $id = $_POST['id'];
                                $objeto->eliminar($id);
                            }else{
                                echo "No se ha podido borrar el jesuita porque falta un campo";
                                echo "<br>";
                                echo "<br>";
                                echo "<a href='../../vistas/crud_jesuita.html'>Volver</a>";
                            } 
                        }else{
                            echo "No se borró al jesuita";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/crud_jesuita.html'>Volver</a>";
                        } 
                        break;
                } 
            }
        } catch (mysqli_sql_exception $e) {
            echo "Se perdió la conexión con la base de datos";
            echo "<br>";
            echo "<br>";
            echo "<a href='../../vistas/crud_jesuita.html'>Volver</a>";
        }
    ?>
    </body>
</html>
    