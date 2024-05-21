<?php 

require_once "../../clases/Conexion.php";
require_once "../../clases/EstudiantesPublic.php";

$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$fechaNacimiento=$_POST['fechaNacimiento'];
$genero=$_POST['genero'];
$ci=$_POST['ci'];
$direccion=$_POST['direccion'];
$vive=$_POST['vive'];
$nacionalidad=$_POST['nacionalidad'];
$curso=$_POST['curso'];
$idusuario=6;

 
$datos=array(	
	$nombres,
	$apellidos,
	$fechaNacimiento,
	$genero,
	$ci,
	$direccion,
	$vive,
	$nacionalidad,
	$curso,
	$idusuario
			);

$obj= new estudiantesPublic();
echo $obj->agregaEstudiantePublic($datos);


 ?>
