<?php
    include 'config.php';
    include 'jesuita.php';

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
                    $objeto->crear($id,$nombre,$firma);
                    echo "El jesuita ".$nombre." ha sido añadido correctamente";
                }else{
                    echo "No se ha podido añadir el jesuita porque falta un campo";
                }
                break;
            case 'update':
                if(!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['firma'])){
                    $id = $_POST['id'];
                    $nombre = $_POST['nombre'];
                    $firma = $_POST['firma'];
                    $objeto->actualizar($id,$nombre,$firma);
                    echo "El jesuita ".$nombre." ha sido actualizado correctamente";
                }else{
                    echo "No se ha podido modificar el jesuita porque falta un campo";
                }
                break;
            case 'delete':
                if(!empty($_POST['id'])){
                    $id = $_POST['id'];
                    $objeto->eliminar($id);
                    echo "El jesuita de id: ".$id." ha sido borrado correctamente";
                }else{
                    echo "No se ha podido borrar el jesuita porque falta un campo";
                }
                break;
        } 
    }
    