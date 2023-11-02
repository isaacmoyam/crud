<?php
    if (!empty($_GET['id']) && !empty($_GET['si'])) {
        $idVisita = $_GET['id'];
        $si = $_GET['si'];
        header("Location:borrar.php?idVisita=$idVisita&si=$si");
        exit;
    }
?>