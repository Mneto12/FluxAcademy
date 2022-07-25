<?php

    include("conexion.php");

    if (isset($_GET['detalles'])) {

        if (empty($_GET['idUsuario'])) {
            echo json_encode(array('success' => 0));
            exit;

        }
    }

       
    $sql = "SELECT * FROM  usuario WHERE idUsuario =".$_SESSION['idUsuario'];

    $resultado = $mysqli->query($sql);
   
    $registros = $resultado->fetch_all(MYSQLI_ASSOC);

      

?>