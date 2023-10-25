<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD Jesuitas</title>
        <link rel="stylesheet" href="../style.css">  
    </head>
    <body>    
    <?php
        include '../config.php';
        include 'jesuita.php';

        try{
            if(isset($_POST['opcion'])){
                $conexion = new Configuracion();
                $opcion = $_POST['opcion'];
                $objeto = new Jesuita($conexion->conexion);
                switch($opcion){    
                    case 'update':
                        if(!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['firma'])){
                            $id = $_POST['id'];
                            $nombre = $_POST['nombre'];
                            $firma = $_POST['firma'];
                            $objeto->actualizar($id,$nombre,$firma);
                        }else{
                            echo "No se ha podido modificar el jesuita porque falta un campo";
                        }
                        break;
                    case 'delete':
                        if(isset($_POST['si'])){
                        if(!empty($_POST['id'])){
                                $id = $_POST['id'];
                                $objeto->eliminar($id);
                            }else{
                                echo "No se ha podido borrar el jesuita porque falta un campo";
                            } 
                        }else{
                            echo "No se borró al jesuita";
                        } 
                        break;
                } 
            }
        }catch (mysqli_sql_exception){
            echo "Se perdió la conexión con la base de datos";
        }
    ?>
    </body>
</html>
    