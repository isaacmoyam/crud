<?php
    include 'config.php';
    include 'jesuita.php';

    if(isset($_GET['opcion'])){
        $conexion = new Configuracion();
        $opcion = $_GET['opcion'];
        $objeto = new Jesuita($conexion->conexion);
        switch($opcion){
            case 'insert':
                $objeto->listar();
                echo '<br><form method="POST" action="procesar_formulario.php">';
                echo '<label for="id">Id:</label>';
                echo '<input type="number" min="0" name="id"<br>';
                echo '<label for="nombre">Nombre:</label>';
                echo '<input type="text" name="nombre"<br>';
                echo '<label for="firma">Firma:</label>';
                echo '<input type="text" name="firma"><br>';
                echo '<input type="hidden" value="'.$opcion.'" name="opcion"><br>';
                echo '<input type="submit">';
                echo '</form>';
                break;
            case 'select':
                $objeto->listar();
                break;
            case 'update':
                $objeto->listar();
                echo '<br><form method="POST" action="procesar_formulario.php">';
                echo '<label for="id">Id:</label>';
                echo '<input type="number" min="0" name="id"<br>';
                echo '<label for="nombre">Nombre:</label>';
                echo '<input type="text" name="nombre"<br>';
                echo '<label for="firma">Firma:</label>';
                echo '<input type="text" name="firma"><br>';
                echo '<input type="hidden" value="'.$opcion.'" name="opcion"><br>';
                echo '<input type="submit">';
                echo '</form>';
                break;
                break;
            case 'delete':
                $objeto->listar();
                echo '<br><form method="POST" action="procesar_formulario.php">';
                echo '<label for="nombre">Id:</label>';
                echo '<input type="number" min="0" name="id"<br>';
                echo '<input type="hidden" value="'.$opcion.'" name="opcion"><br><br>';
                echo '<input type="submit">';
                echo '</form>';
                break;
        } 
    }
    