<?php
    include 'config.php';
    include 'jesuita.php';

    try{
        if(isset($_POST['opcion'])){
            $conexion = new Configuracion();
            $opcion = $_POST['opcion'];
            $objeto = new Jesuita($conexion->conexion);
            switch($opcion){
                case 'insert':
                    if(!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['firma'])){
                        $id = $_POST['id'];
                        $nombre = $_POST['nombre'];
                        $firma = $_POST['firma'];
                        try{
                          $objeto->crear($id,$nombre,$firma);
                        }catch(mysqli_sql_exception){
                            echo"No se pudo insertar al jesuita porque está repetido";
                        }
                    }else{
                        echo "No se ha podido añadir el jesuita porque falta un campo";
                    }
                    break;
                case 'update':
                    if(!empty($_POST['id'])){
                        $id = $_POST['id'];
                        $objeto->consultar($id);
                    }else{
                        echo "No se ha podido modificar el jesuita porque falta un campo";
                    }
                    break;
                case 'delete':
                    if(!empty($_POST['id'])){
                        $id = $_POST['id'];
                        echo "<h3>¿Seguro que quieres borrar al jesuita con id: ".$id."?</h3>";
                        echo "<form action='actualizar_borrar.php' method='POST'>";
                        echo "<input type='submit' name='si' value='Si'>";
                        echo "<input type='submit' name='no' value='No'>";
                        echo '<input type="hidden" name="opcion" value="delete"><br><br>';
                        echo '<input type="hidden" name="id" value="'.$id.'"><br><br>';
                        echo "</form>";
                    }else{
                        echo "No se ha podido borrar el jesuita porque falta un campo";
                    }
                    break;
            } 
        }
    }catch (mysqli_sql_exception){
        echo "Se perdió la conexión con la base de datos";
    }
    