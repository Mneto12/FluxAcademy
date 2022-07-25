<?php

include("conexion.php");


$query = "SELECT DISTINCT * FROM pelicula 
INNER JOIN director_has_pelicula ON pelicula.idPelicula = director_has_pelicula.pelicula_idPelicula
INNER JOIN director ON director_has_pelicula.director_idDirector = director.idDirector
INNER JOIN categoria_has_pelicula ON pelicula.idPelicula = categoria_has_pelicula.pelicula_idPelicula
INNER JOIN categoria ON categoria_has_pelicula.categoria_idCategoria = categoria.idCategoria
order by anioEstreno desc";

if (mysqli_connect_errno()) {
    printf("Falló la conexión failed: %s\n", $mysqli->connect_error);
    exit();
}


$result = $mysqli->query($query);

$peliculas = $result->fetch_all(MYSQLI_ASSOC);

/* liberar la serie de resultados */
$result->free();

/* cerrar la conexión */
$mysqli->close();
?>
