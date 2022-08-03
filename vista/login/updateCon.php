<?php 
if(isset($_POST['btnVerificar'])){
    
    $dbhost ="bfcbdvyi6ggtzay9cgor-mysql.services.clever-cloud.com";
    $dbuser = "ul2al2uqhs423cdd";
    $dbpass = "5CIsbSldPfe9YeAlC7ZW";
    $dbname = "bfcbdvyi6ggtzay9cgor";

    $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if(!$conn){
        die("No hay conexión: ". mysqli_connect_error());
    }

    $correo=$_POST['email'];
    $contrasena=$_POST['contrasena'];
    $confirmar=$_POST['confirmar'];

    if($contrasena == $confirmar){
        $updateContrasena = "UPDATE usuario SET contrasena='$contrasena' where correo = '".$correo."'";
        $resultadoConsulta = $conn->query($updateContrasena);
        if($resultadoConsulta == 1){
            echo 'Contrasena actualizada';  
        }else{
            echo 'No se pudo actualizar en la base de datos';
        }
    }else{
        echo 'las contrasenas no coninciden';
    }
}
?>