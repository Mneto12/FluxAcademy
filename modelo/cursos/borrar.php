<?php

    include("conexion.php");

    if (isset($_POST['edit'])) {

        if (empty($_POST['idCursoEdit'])) {
            echo json_encode(array('success' => 0));
            exit;

        }

    }

    $sql = "SELECT * FROM  cursos WHERE idCurso =".$_POST['idCurso'];

    $resultado = $mysqli->query($sql);
   
    $registros = $resultado->fetch_all(MYSQLI_ASSOC);

    if($resultado) {
        $sql = "DELETE FROM cursos WHERE idCurso =".$_POST['idCurso'];
        
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