<?php
    include 'config.php';
    include 'jesuita.php';

    try{ 
        $conexion = new Configuracion();
        $objeto = new Jesuita($conexion->conexion);
        
        if(isset($_GET['insert'])){
            $objeto->listar();
            echo '<br><form method="POST" action="procesar_formulario.php">';
            echo '<label for="id">Id:</label>';
            echo '<input type="number" min="0" name="id"<br>';
            echo '<label for="nombre">Nombre:</label>';
            echo '<input type="text" name="nombre"<br>';
            echo '<label for="firma">Firma:</label>';
            echo '<input type="text" name="firma"><br>';
            echo '<input type="hidden" value="insert" name="opcion"><br><br>';
            echo '<input type="submit">';
            echo '</form>';
        }
    
        if(isset($_GET['select'])){
            $objeto->listar();
        }
    
        if(isset($_GET['update'])){
            $objeto->listar();
            echo '<br><form method="POST" action="procesar_formulario.php">';
            echo '<label for="id">Id:</label>';
            echo '<input type="number" min="0" name="id"<br>';
            echo '<label for="nombre">Nombre:</label>';
            echo '<input type="text" name="nombre"<br>';
            echo '<label for="firma">Firma:</label>';
            echo '<input type="text" name="firma"><br>';
            echo '<input type="hidden" value="update" name="opcion"><br><br>';
            echo '<input type="submit">';
            echo '</form>';
        }
    
        if(isset($_GET['delete'])){
            $objeto->listar();
            echo '<br><form method="POST" action="procesar_formulario.php">';
            echo '<label for="nombre">Id:</label>';
            echo '<input type="number" min="0" name="id"<br>';
            echo '<input type="hidden" value="delete" name="opcion"><br><br>';
            echo '<input type="submit">';
            echo '</form>';
        }
    }catch (mysqli_sql_exception){
        echo "No se pudo conectar con la base de datos";
    }
?>
    