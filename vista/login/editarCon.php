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
    $respuesta=$_POST['respuesta'];

    $consultaPregunta = "Select * from usuario where correo = '".$correo."'";
    $resultadoConsulta = $conn->query($consultaPregunta);
    $registros = $resultadoConsulta->fetch_all(MYSQLI_ASSOC);
    $datos = json_encode($registros);

    
}
?>

<?php
    foreach ($registros as $registro) {
        if($respuesta == $registro['respuesta']){
?>

<!DOCTYPE html>
<html>

<head>
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="./login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <script defer src="./ValidacionesJs/"></script>
    <!-- Iconos google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
</head>

<div class="img--back"></div>

<body>
    <div class="container">
        <form id="olvido" class="form" method="POST" enctype="multipart/form-data" action="updateCon.php">
            <h1>Recuperar contrase&ntildea</h1>


            <div class="form-field">
                <div class="leyenda">
                    <span class="material-icons-outlined">question_mark</span>
                    <p class="space">Contraseña</p>
                </div>
                <input type="text" name="contrasena" id="contrasena" autocomplete="off" placeholder="Ingrese su contrasena">
                <small class="oculto small">

                </small>
            </div>

            <div class="form-field">
                <div class="leyenda">
                    <span class="material-icons-outlined">question_mark</span>
                    <p class="space">Confirme contrasena</p>
                </div>
                <input type="text" name="confirmar" id="confirmar" autocomplete="off" placeholder="confirmar contrasena">
                <small class="oculto small">

                </small>
            </div>

            <div class="form-field oculto">
                <div class="leyenda">
                    <span class="material-icons-outlined">email</span>
                    <p class="space">Correo</p>
                </div>
                <input type="text" value="<?php echo $registro['correo']?>" name="email" id="email" autocomplete="off" placeholder="Ingresa tu correo">
                <small class="oculto small">
                    
                </small>
            </div>

            <div class="form-field">
                <button type="submit" class="btn" name="btnVerificar">
                    <span class="material-icons-outlined">restart_alt</span>
                    Verificar
                </button>
            </div>

        </form>
    </div>
</body>

</html>

<?php
    }else{
?>
            <h1>Invalido</h1>
<?php
    }
}
?>