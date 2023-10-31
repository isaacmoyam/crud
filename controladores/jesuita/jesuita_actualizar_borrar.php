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
        include '../../conexion/conexiondb.php'; // Incluye el archivo de conexión a la base de datos.
        include '../../modelos/jesuita.php'; // Incluye el archivo que define la clase Jesuita.

        try {
            // Verifica si se ha enviado un formulario con la opción (acción) deseada.
            if (isset($_GET['opcion'])) {

                $conexion = new Conexion(); // Crea un objeto "conexion" de la clase Conexion para establecer la conexión a la base de datos.
                $opcion = $_GET['opcion']; // Obtiene la opción del formulario.
                $objeto = new Jesuita($conexion->conexion); // Crea un objeto "objeto" de la clase Jesuita y pasa la conexión como parámetro.

                // Realiza diferentes acciones según la opción seleccionada.
                switch ($opcion) {
                    case 'update':
                        if (isset($_GET['id']) && !empty($_GET['nombre']) && isset($_GET['firma'])) {

                            $id = $_GET['id'];
                            $nombre = $_GET['nombre'];
                            $firma = $_GET['firma'];
                            $resultado = $objeto->actualizar($id, $nombre, $firma); // Llama al método 'actualizar' de la clase Jesuita.

                            if($resultado == 0) {
                                echo "El jesuita no existe";
                                echo "<br>";
                                echo "<br>";
                                echo "<a href='../../vistas/jesuita/crud_jesuita.html'>Volver</a>";
                            } else {
                                echo "El jesuita ".$nombre." ha sido actualizado correctamente";
                                echo "<br>";
                                echo "<br>";
                                echo "<a href='../../vistas/jesuita/crud_jesuita.html'>Volver</a>";
                            } 
                            
                        } else {
                            // Muestra un mensaje de error si faltan campos para la actualización.
                            echo "No se ha podido modificar el jesuita porque falta un campo";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/jesuita/crud_jesuita.html'>Volver</a>";
                        }
                        break;
                    case 'delete':
                       if ($_GET['si']== 1) {
                            if (!empty($_GET['id'])) {

                                $id = $_GET['id'];
                                $resultado = $objeto->eliminar($id); // Llama al método 'eliminar' de la clase Jesuita.

                                if($resultado == 0) {
                                    echo "No puedes borrar un jesuita que no existe";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<a href='../../vistas/jesuita/crud_jesuita.html'>Volver</a>";
                                } else {
                                    echo "El jesuita ha sido borrado correctamente";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<a href='../../vistas/jesuita/crud_jesuita.html'>Volver</a>";
                                }
                                
                            } else {
                                // Muestra un mensaje de error si falta el campo 'id' para la eliminación.
                                echo "No se ha podido borrar el jesuita porque falta un campo";
                                echo "<br>";
                                echo "<br>";
                                echo "<a href='../../vistas/jesuita/crud_jesuita.html'>Volver</a>";
                            }
                        } else {
                            // Muestra un mensaje si no se confirmó la eliminación ('si' no está definido en el formulario).
                            echo "No se borró al jesuita";
                            echo "<br>";
                            echo "<br>";
                            echo "<a href='../../vistas/jesuita/crud_jesuita.html'>Volver</a>";
                        }
                        break;
                } 
            }
        } catch (mysqli_sql_exception $e) {
            // Muestra un mensaje de error en caso de pérdida de conexión con la base de datos.
            echo "Se perdió la conexión con la base de datos";
            echo "<br>";
            echo "<br>";
            echo "<a href='../../vistas/jesuita/crud_jesuita.html'>Volver</a>";
        }
    ?>
    </body>
</html>
    