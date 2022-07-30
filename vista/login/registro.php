<!DOCTYPE html>
<html>

<head>
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="./login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="./ValidacionesJs/OnlyText.js"></script>
    <script defer src="./ValidacionesJs/OnlyNumbers.js"></script>
    <link rel="icon" href="./img/favicon.ico" type="image/x-icon">
    <!-- Iconos google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
</head>

<div class="img--back"></div>

<body>
    <div class="container container--registro">

        <h1>Registro</h1>
        <form class="form--registro" method="POST" id="formUsuario" enctype="multipart/form-data">
            <div class="form-field">
                <div class="leyenda">
                    <span class="material-icons-outlined">badge</span>
                    <p class="space">Cedula</p>
                </div>
                <input type="text" name="cedula" id="cedula" autocomplete="off" placeholder="Ingrese su cedula" maxlength="8" onkeypress="return onlyNumberKey(event)">
                <small class="oculto small">

                </small>
            </div>

            <hr class="spacer">

            <div class="form-field">
                <div class="leyenda">
                    <span class="material-icons-outlined">face</span>
                    <p class="space">Nombre</p>
                </div>
                <input type="text" name="nombre" id="nombre" autocomplete="off" placeholder="Ingrese su nombre" onkeypress="return onlyTextKey(event)">
                <small class="oculto small">

                </small>
            </div>

            <div class="form-field">
                <div class="leyenda">
                    <span class="material-icons-outlined">face</span>
                    <p class="space">Apellido</p>
                </div>
                <input type="text" name="apellido" id="apellido" autocomplete="off" placeholder="Ingrese su apellido" onkeypress="return onlyTextKey(event)">
                <small class="oculto small">

                </small>
            </div>
            <div class="form-field">
                <div class="leyenda">
                    <span class="material-icons-outlined">wc</span>
                    <p class="space">Genero</p>
                </div>
                <div class="form-field--genero">
                    <span>Masculino</span>
                    <input class="sexo" type="radio" name="genero" id="hombre" value="Masculino">

                    <span>Femenino</span>
                    <input class="sexo" type="radio" name="genero" id="mujer" value="Femenino">
                </div>
                <small class="oculto error small">

                </small>
            </div>

            <hr class="spacer">

            <div class="form-field">
                <div class="leyenda">
                    <span class="material-icons-outlined">calendar_month</span>
                    <p class="space">Fecha de nacimiento</p>
                </div>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" autocomplete="off">
                <small class="oculto small">

                </small>
            </div>
            <hr class="spacer">

            <div class="form-field">
                <div class="leyenda">
                    <span class="material-icons-outlined">person</span>
                    <p class="space">Nombre de usuario</p>
                </div>
                <input type="text" name="nombre_usuario" id="nombre_usuario" autocomplete="off" placeholder="Ingrese un nombre de usuario">
                <small class="oculto small">

                </small>
            </div>

            <hr class="spacer">

            <div class="form-field">
                <div class="leyenda">
                    <span class="material-icons-outlined">email</span>
                    <p class="space">Correo</p>
                </div>
                <input type="email" name="correo" id="correo" autocomplete="off" placeholder="Ingrese su correo">
                <small class="oculto small">

                </small>
            </div>

            <hr class="spacer">

            <div class="form-field">
                <div class="leyenda">
                    <span class="material-icons-outlined">password</span>
                    <p class="space">Contraseña</p>
                </div>
                <input type="password" name="contrasena" id="contrasena" autocomplete="off" placeholder="Ingese una contraseña fuerte">
                <small class="oculto small">

                </small>
            </div>


            <hr class="spacer">

            <div class="form-field">
                <div class="leyenda">
                    <span class="material-icons-outlined">pattern</span>
                    <p class="space">Confirmar contraseña</p>
                </div>
                <input type="password" name="confirm-password" id="confirm-password" autocomplete="off" placeholder="Confirme la contraseña">
                <small class="oculto small">

                </small>
            </div>

            <div class="form--imagen">
                <div class="leyenda">
                    <span class="material-icons-outlined">add_a_photo</span>
                    <label class="space" for="filechooser">Foto de perfil</label>
                </div>
                <input class="fileC form-control mb-2 mr-sm-2" type="file" name="filechooser" id="filechooser">
                <input hidden type="text" name="imagen" id="imagen">
                <small class="oculto small">
                    
                </small>
                <!-- <div class="form-group">
                    <input hidden type="text" name="imagen" id="imagen">
                </div> -->
            </div>

            <div class="form-field">
                <button type="button" name="guardar" class="btn" onclick="submitForm('true')">Registrar</button>
            </div>
            <div class="form-field">
                <button type="button" name="guardar" class="btn" onclick="cambia_de_pagina()">Cancelar</button>
            </div>

        </form>

    </div>
    <script src="../../assets/js/registro.js"></script>
    <script src="../../assets/js/jquery-3.5.1.js"></script>

    <script>
        function cambia_de_pagina() {
            location.href = "./login.php"
        }
    </script>


</body>

</html>