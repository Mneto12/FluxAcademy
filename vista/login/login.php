<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="./login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <script defer src="./ValidacionesJs/login.js"></script>
    <!-- Iconos google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">

</head>

<div class="img--back"></div>
<body>
    <div class="container container--login">
        <form id="signup" class="form form--login" method="POST">

            <div class="header--login">
                <img src="./img/icon.png" alt="">
            </div>

            <div class="form-field">
                <div class="leyenda">
                    <span class="material-icons-outlined">person</span>
                    <p class="space">Nombre de usuario</p>
                </div>
                <input type="text" name="username" id="username" autocomplete="off" placeholder="Ingrese su nombre de usuario">
                <small class="oculto small">
                    
                </small>
            </div>

            <div class="form-field">
                <div class="leyenda">
                    <span class="material-icons-outlined">password</span>
                    <p class="space">Contraseña</p>
                </div>
                <input type="password" name="password" id="password" autocomplete="off"
                    placeholder="Ingrese su contraseña">
                <small class="oculto small">
                    
                </small>
            </div>

            
            <div class="form-field">
                <button type="submit" class="btn" name="btningresar" >
                    <span class="material-icons-outlined">login</span>
                    Iniciar sesion
                </button>
            </div>

            <div class="form-field formFlex">
                <a href="./olvido.html" target="_blank">¿Olvidaste tu contraseña?</a>
                <a href="./registro.php">Registro</a>
                <a href="./admin.php">Entrar como administrador</a>
            </div>
        </form>
    </div>
</body>

</html>

<?php 

session_start();
if(isset($_SESSION['nombredelusuario'])){
    
    header('location: ../index.php');
}

if(isset($_POST['btningresar'])){
    
    $localhost ="bfcbdvyi6ggtzay9cgor-mysql.services.clever-cloud.com";
    $username = "ul2al2uqhs423cdd";
    $password = "5CIsbSldPfe9YeAlC7ZW";
    $database = "bfcbdvyi6ggtzay9cgor";

    $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if(!$conn){
        die("No hay conexión: ". mysqli_connect_error());
    }

    $nombre=$_POST['username'];
    $pass=$_POST['password'];

    $query=mysqli_query($conn,"Select idUsuario, nombre_usuario, contrasena, nombre, apellido from usuario where nombre_usuario = '".$nombre."' and contrasena = '".$pass."'");
    $nr=mysqli_num_rows($query);
    $fila= mysqli_fetch_array($query);

    if(!isset($_SESSION['nombredelusuario'])){
        
        if($nr==1){
            $_SESSION['nombredelusuario']=$nombre;
            $_SESSION['idUsuario']=$fila['idUsuario'];
            $_SESSION['nombreyapellido']=$fila['nombre']. ' ' . $fila['apellido'];

            
            header("location: ../index.php");
        }
        else if($nr==0){
            if($_POST['username']=='' or $_POST['password']==''){
                echo ("<div class='error'>Error!: Complete todos los campos</div>");
                return;
            }
            echo ("<div class='error'>Error!: Usuario o contraseña incorrecta</div>");
            return;
        }
    }

}
?>