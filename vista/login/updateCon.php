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

}
?>

<?php
    if($contrasena == $confirmar && !empty($contrasena) && !empty($confirmar)){
        $updateContrasena = "UPDATE usuario SET contrasena='$contrasena' where correo = '".$correo."'";
        $resultadoConsulta = $conn->query($updateContrasena);

        if($resultadoConsulta == 1){
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
    <script>
        alert('Su contraseña fue actualizada exitosamente');
        location.href = "./login.php";
    </script>
</body>

</html>

<?php
        }else if(empty($contrasena) || empty($confirmar)){
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
            <p>3 - 4 Cambiar contraseña</p>

            <hr class="spacer--desktop">

            <div class="form-field">
                <div class="leyenda">
                <span class="material-icons-outlined">password</span>
                    <p class="space">Contraseña</p>
                </div>
                <input type="password" name="contrasena" id="contrasena" autocomplete="off" placeholder="Ingrese su contraseña">
                <small class="oculto small">

                </small>
            </div>

            <div class="form-field error">
                <div class="leyenda">
                <span class="material-icons-outlined">password</span>
                    <p class="space">Confirme contraseña</p>
                </div>
                <input type="password" name="confirmar" id="confirmar" autocomplete="off" placeholder="confirmar contraseña">
                <small class="error small">
                    Los campos no pueden estar vacios
                </small>
            </div>

            <div class="form-field oculto">
                <div class="leyenda">
                    <span class="material-icons-outlined">password</span>
                    <p class="space">Correo</p>
                </div>
                <input type="text" value="<?php echo $registro['correo']?>" name="email" id="email" autocomplete="off" placeholder="Ingresa tu correo">
                <small class="oculto small">
                    
                </small>
            </div>

            <div class="form-field">
                <button type="submit" class="btn" name="btnVerificar">
                    <span class="material-icons-outlined">restart_alt</span>
                    Actualizar
                </button>
            </div>

        </form>
    </div>
</body>

</html>
<?php
        }
    }else{
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
            <p>3 - 4 Cambiar contraseña</p>

            <hr class="spacer--desktop">

            <div class="form-field">
                <div class="leyenda">
                <span class="material-icons-outlined">password</span>
                    <p class="space">Contraseña</p>
                </div>
                <input type="password" name="contrasena" id="contrasena" autocomplete="off" placeholder="Ingrese su contraseña">
                <small class="oculto small">

                </small>
            </div>

            <div class="form-field error">
                <div class="leyenda">
                <span class="material-icons-outlined">password</span>
                    <p class="space">Confirme contraseña</p>
                </div>
                <input type="password" name="confirmar" id="confirmar" autocomplete="off" placeholder="confirmar contraseña">
                <small class="error small">
                    La contraseña no coincide
                </small>
            </div>

            <div class="form-field oculto">
                <div class="leyenda">
                    <span class="material-icons-outlined">password</span>
                    <p class="space">Correo</p>
                </div>
                <input type="text" value="<?php echo $registro['correo']?>" name="email" id="email" autocomplete="off" placeholder="Ingresa tu correo">
                <small class="oculto small">
                    
                </small>
            </div>

            <div class="form-field">
                <button type="submit" class="btn" name="btnVerificar">
                    <span class="material-icons-outlined">restart_alt</span>
                    Actualizar
                </button>
            </div>

        </form>
    </div>
</body>

</html>

        <?php
    }
?>