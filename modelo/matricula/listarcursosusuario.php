<?php

include("conexion.php");

session_start();

$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


//$query = "select * from cursos order by idCurso desc limit ".$start." , ".$perPage." ";
$query = "SELECT matricula.idCurso, matricula.idUsuario, matricula.idInscripcion, cursos.nombre_curso, cursos.descripcion, cursos.duracion, cursos.imagen AS imagen, cursos.video  FROM matricula, cursos, usuario WHERE matricula.idCurso=cursos.idCurso AND matricula.idUsuario= usuario.idUsuario AND usuario.idUsuario=".$_SESSION['idUsuario']." order by cursos.nombre_curso";

$total = $mysqli->query("select * from cursos order by idCurso desc")->num_rows;
$pages = ceil($total / $perPage);

if (mysqli_connect_errno()) {
    printf("Falló la conexión failed: %s\n", $mysqli->connect_error);
    exit();
}


$result = $mysqli->query($query);

$curso = $result->fetch_all(MYSQLI_ASSOC);

/* liberar la serie de resultados */
$result->free();

/* cerrar la conexión */
$mysqli->close();
?>
