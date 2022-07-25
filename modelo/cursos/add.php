<?php
    include("conexion.php");

    if (isset($_POST['guardar'])) 
    {
        
        if (empty($_POST['nombre_curso'])) {
            echo json_encode(array('success' => 0));
            exit;

        }
    }

    isset($_POST['nombre_curso']) ? $nombre_curso = htmlspecialchars($_POST['nombre_curso']) : $mensaje=true;
    isset($_POST['descripcion']) ? $descripcion = htmlspecialchars($_POST['descripcion']) : $mensaje = true;
    isset($_POST['duracion']) ? $duracion = htmlspecialchars($_POST['duracion']) : $mensaje=true;
    isset($_POST['imagen']) ? $imagen = htmlspecialchars($_POST['imagen']) : $mensaje = true;
    isset($_POST['video']) ? $video = htmlspecialchars($_POST['video']) : $mensaje = true;


    $sql = "INSERT INTO cursos (nombre_curso, descripcion, duracion, imagen, video) VALUES ('$nombre_curso','$descripcion', '$duracion', '$imagen', '$video')";


    $resultado = $mysqli->query($sql);
    if($resultado==1) {
        echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('success' => 0));
    }
  

?>