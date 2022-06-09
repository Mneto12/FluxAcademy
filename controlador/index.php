<?php
require_once("../../modelo/index.php");
class modeloController{
    private $model;
    public function __construct()
    {
        $this->model = new Modelo();
    }

    static function index(){
        $curso = new Modelo();
        $datos = $curso->mostrar("cursos","1");
        require_once("../../vista/admin/listar_cursos.php");
    }

     // INSERTAR
    static function nuevo(){
    	require_once("../../vista/admin/nuevo.php");	    	    	
    }
    static function guardar(){
    	$nombre_curso 	=	$_REQUEST['nombre_curso'];
    	$descripcion 	=	$_REQUEST['descripcion'];
        $duracion 	=	$_REQUEST['duracion'];
    	$imagen 	=	$_REQUEST['imagen'];
        $data       =   "'".$nombre_curso."','".$descripcion."',".$duracion.",'".$imagen."'";
    	$curso 	=	new Modelo();
		$datos 		=	$curso->insertar("cursos",$data);
        header("location: /vista/index.php");
    }
}