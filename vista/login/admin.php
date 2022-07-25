<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="./login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="./ValidacionesJs/login.js"></script>
    <!-- Iconos google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
</head>

<div class="img--back"></div>

<body>
    <div class="container container--login">
        <form id="signup" class="form form--login" method="POST" action="">
            <h1>Admin</h1>

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
                <button type="button" class="btn" onclick="admin()">
                    <span class="material-icons-outlined">login</span>
                    Iniciar sesion
                </button>
            </div>
        </form>
    </div>
</body>

</html>

<script text="text/javascript">


    function admin(){

        let  clave = document.getElementById("password").value;
        if(clave == 123456789){
            location.href = "/vista/index2.php"
        }else{
            alert("Error!: Clave de administrador invalidad.")
        }
    }

</script>
