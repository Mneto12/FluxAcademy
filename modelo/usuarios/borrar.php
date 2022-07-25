<?php

    include("conexion.php");

    if (isset($_POST['idUsuario'])) {

        if (empty($_POST['idUsuario'])) {
            echo json_encode(array('success' => 0));
            exit;

        }

    }

    $sql = "SELECT * FROM  usuario WHERE idUsuario =".$_POST['idUsuario'];

    $resultado = $mysqli->query($sql);
   
    $registros = $resultado->fetch_all(MYSQLI_ASSOC);

    if($resultado) {
        $sql = "DELETE FROM usuario WHERE idUsuario =".$_POST['idUsuario'];
        
        $resultadoEdit = $mysqli->query($sql);

        if ($resultado) {
            echo json_encode(array('success' => 1));
        } else {
            echo json_encode(array('success' => 0));
        }
    } else {
        echo json_encode(array('success' => 0));
    }

       
    
  

?>