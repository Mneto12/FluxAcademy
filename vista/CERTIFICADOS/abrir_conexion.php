<?php 
	$localhost ="bfcbdvyi6ggtzay9cgor-mysql.services.clever-cloud.com";
	$username = "ul2al2uqhs423cdd";
	$password = "5CIsbSldPfe9YeAlC7ZW";
	$database = "bfcbdvyi6ggtzay9cgor"; 

	//Lista de Tablas	   // tabla de usuarios
	

	//error_reporting(0); //No me muestra errores
	
	$mysqli = new mysqli($localhost, $username,$password, $database);


	if ($mysqli->connect_errno) {
	    echo "Nuestro sitio experimenta fallos....";
	    exit();
	}

?>