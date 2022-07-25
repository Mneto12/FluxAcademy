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
        isset($_POST['nombre_cursoEdit']) ? $nombre_curso = htmlspecialchars($_POST['nombre_cursoEdit']) : $mensaje=true;
        isset($_POST['descripcionEdit']) ? $descripcion = htmlspecialchars($_POST['descripcionEdit']) : $mensaje = true;
        isset($_POST['duracionEdit']) ? $duracion = htmlspecialchars($_POST['duracionEdit']) : $mensaje=true;
        isset($_POST['imagenEdit']) ? $imagen = htmlspecialchars($_POST['imagenEdit']) : $mensaje = true;
        isset($_POST['videoEdit']) ? $video = htmlspecialchars($_POST['videoEdit']) : $mensaje = true;

        
        $sql2 = "UPDATE cursos SET nombre_curso='$nombre_curso', descripcion='$descripcion', duracion='$duracion', imagen='$imagen', video='$video' WHERE idCurso =".$_POST['idCursoEdit'];

        

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