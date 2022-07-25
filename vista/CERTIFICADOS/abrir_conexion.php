<?php 
	$localhost ="bfcbdvyi6ggtzay9cgor-mysql.services.clever-cloud.com";
	$username = "ul2al2uqhs423cdd";
	$password = "5CIsbSldPfe9YeAlC7ZW";
	$database = "bfcbdvyi6ggtzay9cgor";

	//Lista de Tablas
	$tabla_db1 = "usuario"; 	   // tabla de usuarios
	

	//error_reporting(0); //No me muestra errores
	
	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);


	if ($conexion->connect_errno) {
	    echo "Nuestro sitio experimenta fallos....";
	    exit();
	}

?>