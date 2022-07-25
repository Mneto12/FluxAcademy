<?php

    include("conexion.php");

    if (isset($_GET['detalles'])) {

        if (empty($_GET['idUsuario'])) {
            echo json_encode(array('success' => 0));
            exit;

        }
    }

       
    $sql = "SELECT * FROM  usuario WHERE idUsuario =".$_GET['idUsuario'];

    $resultado = $mysqli->query($sql);
   
    $registros = $resultado->fetch_all(MYSQLI_ASSOC);

    if($resultado) {
        echo json_encode($registros);
    } else {
        echo json_encode(array('success' => 0));
    }
  

?>