<?php

session_start();
include("../../modelo/usuarios/conexion.php");

if (isset($_GET['detalles'])) {

    if (empty($_GET['idUsuario'])) {
        echo json_encode(array('success' => 0));
        exit;
    }
}


$sql = "SELECT * FROM  usuario WHERE idUsuario =" . $_SESSION['idUsuario'];

$resultado = $mysqli->query($sql);

$registros = $resultado->fetch_all(MYSQLI_ASSOC);

$datos = json_encode($registros);

?>

<?php
foreach ($registros  as $registro) {
?>

    <div class="card col-md-12">
        <div class="card-header bg-teal color-palette">
            <h1 class="m-0">Perfil de Usuario</h1>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <center><label for="imagenDetalle"><strong>Foto de Perfil</strong></label> <br> <br>
                                <img class="img-circle" width="200px" height="200px" style="border: 1 solid ;" name="imagenDetalle" id="imagenDetalle" src="../../assets/img/<?php echo $registro['imagen'] ?>" alt="">
                            </center>
                        </div>

                    </div>
                    <div class="row col-sm-7 ml-5">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="cedulaDetalle"><strong>Cédula: </strong></label>
                                <input type="int" disabled class="form-control" name="cedulaDetalle" id="cedulaDetalle" value="<?php echo $registro['cedula'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="nombreDetalle"><strong>Nombre</strong></label>
                                <input type="text" disabled class="form-control" name="nombreDetalle" id="nombreDetalle" value="<?php echo $registro['nombre'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="apellidoDetalle"><strong>Apellido</strong></label>
                                <input type="text" disabled class="form-control" name="apellidoDetalle" id="apellidoDetalle" value="<?php echo $registro['apellido'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="generoDetalle"><strong>Género</strong></label>
                                <input type="text" disabled class="form-control" name="generoDetalle" id="generoDetalle" value="<?php echo $registro['genero'] ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="fecha_nacimientoDetalle"><strong>Fecha de Nacimiento</strong></label>
                                <input type="date" disabled class="form-control" name="fecha_nacimientoDetalle" id="fecha_nacimientoDetalle" value="<?php echo $registro['fecha_nacimiento'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="nombre_usuarioDetalle"><strong>Nombre de Usuario</strong></label>
                                <input type="text" disabled class="form-control" name="nombre_usuarioDetalle" id="nombre_usuarioDetalle" value="<?php echo $registro['nombre_usuario'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="correoDetalle"><strong>Correo Electrónico</strong></label>
                                <input type="text" disabled class="form-control" name="correoDetalle" id="correoDetalle" value="<?php echo $registro['correo'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="contrasenaDetalle"><strong>Contraseña</strong></label>
                                <input type="password" disabled class="form-control" name="contrasenaDetalle" id="contrasenaDetalle" value="<?php echo $registro['contrasena'] ?>">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php } ?>




<script src="../../assets/js/usuario.js"></script>