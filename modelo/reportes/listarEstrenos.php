<?php

include("conexion.php");


$page = (isset($_GET['page']) ? $_GET['page'] : 1);
$perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


$query = "SELECT DISTINCT * FROM pelicula 
INNER JOIN director_has_pelicula ON pelicula.idPelicula = director_has_pelicula.pelicula_idPelicula
INNER JOIN director ON director_has_pelicula.director_idDirector = director.idDirector
INNER JOIN categoria_has_pelicula ON pelicula.idPelicula = categoria_has_pelicula.pelicula_idPelicula
INNER JOIN categoria ON categoria_has_pelicula.categoria_idCategoria = categoria.idCategoria
WHERE pelicula.anioEstreno = 2021 order by idPelicula desc limit ".$start." , ".$perPage." ";


$query2 = "SELECT DISTINCT * FROM pelicula 
INNER JOIN director_has_pelicula ON pelicula.idPelicula = director_has_pelicula.pelicula_idPelicula
INNER JOIN director ON director_has_pelicula.director_idDirector = director.idDirector
INNER JOIN categoria_has_pelicula ON pelicula.idPelicula = categoria_has_pelicula.pelicula_idPelicula
INNER JOIN categoria ON categoria_has_pelicula.categoria_idCategoria = categoria.idCategoria 
WHERE pelicula.anioEstreno = 2021 order by idPelicula desc";


$total = $mysqli->query($query2)->num_rows;
$pages = ceil($total / $perPage);

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
