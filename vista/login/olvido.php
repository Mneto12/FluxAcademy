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
        <form id="olvido" class="form" method="POST" enctype="multipart/form-data" action="validarPregunta.php">
            <h1>Recuperar contrase&ntildea</h1>
            <p>1 - 4 Confirmar correo</p>

            <hr class="spacer--desktop">

            <div class="form-field">
                <div class="leyenda">
                    <span class="material-icons-outlined">email</span>
                    <p class="space">Correo</p>
                </div>
                <input type="text" name="email" id="email" autocomplete="off" placeholder="Ingresa tu correo">
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