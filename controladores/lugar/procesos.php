<?php
    if (isset($_GET['opcion'])) {
        
        $opcion = $_GET['opcion']; // Obtiene la opción (acción) del formulario.

        // Realiza diferentes acciones según la opción seleccionada.
        switch ($opcion) {
            case 'update':
                if (!empty($_GET['ip']) && !empty($_GET['lugar']) && isset($_GET['desc'])) {
                    // Verifica si los campos necesarios no están vacíos.
                    $ip = $_GET['ip'];
                    $lugar = $_GET['lugar'];
                    $descripcion = $_GET['desc'];
                    header("Location:actualizar.php?ip=$ip&lugar=$lugar&desc=$descripcion");  
                    exit;
                }
            break;
            case 'delete':
                if (!empty($_GET['ip']) && !empty($_GET['si'])) {
                    // Verifica si se ha confirmado la eliminación y el campo 'ip' no está vacío.
                    $ip = $_GET['ip'];
                    $si = $_GET['si'];
                    header("Location:borrar.php?ip=$ip&si=$si");
                    exit;
                }
            break;
        } 
    }
?>