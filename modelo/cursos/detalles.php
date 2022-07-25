<?php

    include("conexion.php");

    if (isset($_GET['detalles'])) {

        if (empty($_GET['idCurso'])) {
            echo json_encode(array('success' => 0));
            exit;

        }
    }

       
    $sql = "SELECT * FROM  cursos WHERE idCurso =".$_GET['idCurso'];

    $resultado = $mysqli->query($sql);
   
    $registros = $resultado->fetch_all(MYSQLI_ASSOC);

    if($resultado) {
        echo json_encode($registros);
    } else {
        echo json_encode(array('success' => 0));
    }
  

?>