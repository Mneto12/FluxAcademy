<?php

$localhost ="localhost";
$username = "root";
$password = "";
$database = "cursonline";  

$mysqli = new mysqli($localhost, $username,$password, $database);

if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit();
}

?>