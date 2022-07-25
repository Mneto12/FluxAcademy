<?php

    include("conexion.php");

    if (isset($_POST['edit'])) {

        if (empty($_POST['idCursoEdit'])) {
            echo json_encode(array('success' => 0));
            exit;

        }

    }

    $sql = "SELECT * FROM  cursos WHERE idCurso =".$_POST['idCursoEdit'];

    $resultado = $mysqli->query($sql);
   
    $registros = $resultado->fetch_all(MYSQLI_ASSOC);

    if($resultado) {
        isset($_POST['idCursoEdit']) ? $idCurso = htmlspecialchars($_POST['idCursoEdit']) : $mensaje=true;
        isset($_POST['idUsuarioEdit']) ? $idUsuario = htmlspecialchars($_POST['idUsuarioEdit']) : $mensaje = true;
       

        $sql2 = "INSERT INTO matricula (idCurso, idUsuario) VALUES ('$idCurso','$idUsuario')";


        $resultadoEdit = $mysqli->query($sql2);

        if ($resultadoEdit==1) {
            echo json_encode(array('success' => 1));
        } else {
            echo json_encode(array('success' => 0));
        }
    } else {
        echo json_encode(array('success' => 0));
    }

       
    
  

?>