<?php

    include("conexion.php");

    if (isset($_POST['edit'])) {

        if (empty($_POST['idUsuarioEdit'])) {
            echo json_encode(array('success' => 0));
            exit;

        }

    }

    $sql = "SELECT * FROM  usuario WHERE idUsuario =".$_POST['idUsuarioEdit'];

    $resultado = $mysqli->query($sql);
   
    $registros = $resultado->fetch_all(MYSQLI_ASSOC);

    if($resultado) {
        isset($_POST['cedulaEdit']) ? $cedula = htmlspecialchars($_POST['cedulaEdit']) : $mensaje=true;
        isset($_POST['nombreEdit']) ? $nombre = htmlspecialchars($_POST['nombreEdit']) : $mensaje = true;
        isset($_POST['apellidoEdit']) ? $apellido = htmlspecialchars($_POST['apellidoEdit']) : $mensaje = true;
        isset($_POST['generoEdit']) ? $genero = htmlspecialchars($_POST['generoEdit']) : $mensaje = true;
        isset($_POST['fecha_nacimientoEdit']) ? $fecha_nacimiento = htmlspecialchars($_POST['fecha_nacimientoEdit']) : $mensaje = true;
        isset($_POST['nombre_usuarioEdit']) ? $nombre_usuario = htmlspecialchars($_POST['nombre_usuarioEdit']) : $mensaje = true;
        isset($_POST['correoEdit']) ? $correo = htmlspecialchars($_POST['correoEdit']) : $mensaje = true;
        isset($_POST['contrasenaEdit']) ? $contrasena = htmlspecialchars($_POST['contrasenaEdit']) : $mensaje = true;
        isset($_POST['imagenEdit']) ? $imagen = htmlspecialchars($_POST['imagenEdit']) : $mensaje = true;

        $sql2 = "UPDATE usuario SET cedula='$cedula', nombre='$nombre', apellido='$apellido', genero='$genero', fecha_nacimiento=STR_TO_DATE('$fecha_nacimiento','%Y-%m-%d'), nombre_usuario='$nombre_usuario', correo='$correo', contrasena='$contrasena', imagen='$imagen' WHERE idUsuario =".$_POST['idUsuarioEdit'];

        

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