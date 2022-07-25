<?php 

if ($_SERVER['DOCUMENT_ROOT'] == "C:/xampp/htdocs") 
        $rutaEventos = "/indicadoreseyp/"; 
    else 
        $rutaEventos = "/"; 
include($_SERVER['DOCUMENT_ROOT'].$rutaEventos."configuracion.php");

$mysqli = new mysqli($localhost, $username,$password, $database);

if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

?>

 
