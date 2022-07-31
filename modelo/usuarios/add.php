<?php

    include("conexion.php");


    if (isset($_POST['guardar'])) 
    {
        
        if (empty($_POST['nombre_usuario'])) {
            echo json_encode(array('success' => 0));
            exit;

        }
    }

    isset($_POST['cedula']) ? $cedula = htmlspecialchars($_POST['cedula']) : $mensaje=true;
    isset($_POST['nombre']) ? $nombre = htmlspecialchars($_POST['nombre']) : $mensaje = true;
    isset($_POST['apellido']) ? $apellido = htmlspecialchars($_POST['apellido']) : $mensaje = true;
    isset($_POST['genero']) ? $genero = htmlspecialchars($_POST['genero']) : $mensaje = true;
    isset($_POST['fecha_nacimiento']) ? $fecha_nacimiento = htmlspecialchars($_POST['fecha_nacimiento']) : $mensaje = true;
    isset($_POST['nombre_usuario']) ? $nombre_usuario = htmlspecialchars($_POST['nombre_usuario']) : $mensaje = true;
    isset($_POST['correo']) ? $correo = htmlspecialchars($_POST['correo']) : $mensaje = true;
    isset($_POST['imagen']) ? $imagen = htmlspecialchars($_POST['imagen']) : $mensaje = true;
    isset($_POST['contrasena']) ? $contrasena = htmlspecialchars($_POST['contrasena']) : $mensaje = true;

    $sqlconsulta = 'SELECT cedula, nombre_usuario, correo FROM usuario WHERE cedula='.$cedula.' OR nombre_usuario="'.$nombre_usuario.'" OR correo="'.$correo.'"';
   
    $resultadoconsulta= $mysqli->query($sqlconsulta);

    if($resultadoconsulta->num_rows >= 1) {
        echo json_encode(array('success' => 2));
        return;
    }

    $sql = "INSERT INTO usuario (cedula, nombre, apellido, genero, fecha_nacimiento, nombre_usuario, correo, contrasena, imagen) VALUES ('$cedula', '$nombre', '$apellido', '$genero', STR_TO_DATE('$fecha_nacimiento','%Y-%m-%d'), '$nombre_usuario', '$correo', '$contrasena', '$imagen')";
    
    $resultado = $mysqli->query($sql);


    if($resultado==1) {
          echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('success' => 0));
    }
  

?>