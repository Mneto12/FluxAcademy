<?php
require_once("../../controlador/index.php");

if(isset($_GET['m'])):
    $metodo =   $_GET['m'];
    if(method_exists(modeloController::class,$_GET['m'])):
        modeloController::{$_GET['m']}();
    endif;
else:
    modeloController::index();
endif;
?>