<?php 
session_start();
require_once "../../clases/Conexion.php";
require_once "../../clases/Cursos.php";

$curso=$_POST['curso'];


$datos=array(
	$curso
			);

$obj= new cursos();
echo $obj->agregaCurso($datos);

 ?>
