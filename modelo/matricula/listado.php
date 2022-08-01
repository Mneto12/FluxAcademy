<?php

include("conexion.php");


$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


$query = "select * from cursos, matricula, usuario WHERE
matricula.idUsuario=usuario.idUsuario AND matricula.idCurso=cursos.idCurso order by idInscripcion ";

$total = $mysqli->query("select * from matricula order by idInscripcion desc")->num_rows;
$pages = ceil($total / $perPage);

if (mysqli_connect_errno()) {
    printf("Falló la conexión failed: %s\n", $mysqli->connect_error);
    exit();
}


$result = $mysqli->query($query);

$matriculas = $result->fetch_all(MYSQLI_ASSOC);

/* liberar la serie de resultados */
$result->free();

/* cerrar la conexión */
$mysqli->close();
?>
