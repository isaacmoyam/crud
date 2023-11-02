<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD Visita</title>
        <link rel="stylesheet" href="../../css/style.css">    
    </head>
    <body>
    <?php
        include '../../modelos/conexion/conexiondb.php'; 
        include '../../modelos/jesuita.php'; 
        include '../../modelos/lugar.php';
        include '../../modelos/visita.php';  

        $conexion = new Conexion(); 
        $objetoJesuita = new Jesuita($conexion->conexion); 
        $objetoLugar = new Lugar($conexion->conexion);
        $objetoVisita = new Visita($conexion->conexion); 
        $opcion = $_GET['opcion']; 

        switch ($opcion){
            case 'insert':
                echo '<br><form method="GET" action="../../controladores/visita/visita_procesar_formulario.php">';
                echo '<label>Nº de puesto:</label>';
                $resultadoJ = $objetoJesuita->listar();
                if ($resultadoJ->num_rows > 0) {
                    echo "<select name='id'>";
                        while($fila = $resultadoJ->fetch_assoc()){
                            $id = $fila['idJesuita'];
                            echo '<option value='.$id.'>'.$id.'</option>';
                        }
                    echo "</select>";
                }
                echo "<br>";
                echo "<br>";
                echo '<label>Ip:</label>';
                $resultadoL = $objetoLugar->listar();
                if ($resultadoL->num_rows > 0) {
                    echo "<select name='ip'>";
                        while($fila = $resultadoL->fetch_assoc()){
                            $ip = $fila['ip'];
                            echo '<option value='.$ip.'>'.$ip.'</option>';
                        }
                    echo "</select>";
                }
                echo '<input type="hidden" value="insert" name="opcion"><br>';
                echo "<br>";
                echo '<input type="submit">';
                echo '</form>';
                echo "<br>";
                echo "<br>";
                echo "<a href='crud_visita.html'>Volver</a>";    
            break;
            case 'select':
                $resultado = $objetoVisita->listar();
                if ($resultado->num_rows > 0) {
                    echo "<table border='2px'>";
                    echo "<tr>";
                    echo "<th>Nº VISITA</th>";
                    echo "<th>Nº PUESTO</th>";
                    echo "<th>IP VISITADA</th>";
                    echo "<th>FECHA Y HORA</th>";
                    echo "<th></th>";
                    echo "</tr>";
                    while ($fila = $resultado->fetch_assoc()){
                        echo "<tr>";
                        $idVisita = $fila['idVisita'];
                        $id = $fila['idJesuita'];
                        $ip = $fila['ip'];
                        $fecha = $fila['fechaHora'];
                        echo "<td>".$idVisita."</td>";
                        echo "<td>".$id."</td>";
                        echo "<td>".$ip."</td>";
                        echo "<td>".$fecha."</td>";
                        echo "<td><a href='../../controladores/visita/visita_procesar_formulario.php?opcion=delete&idVisita=$idVisita'>🗑</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "<br>";
                    echo "<br>";
                    echo "<a href='crud_visita.html'>Volver</a>";
                } else {
                    echo "No se encontraron resultados.";
                    echo "<br>";
                    echo "<br>";
                    echo "<a href='crud_visita.html'>Volver</a>";
                }
                $resultado->close();
            break;
            default:
                echo "Esa opción no existe";
            break;
        }
    ?>
    </body>
</html>
    