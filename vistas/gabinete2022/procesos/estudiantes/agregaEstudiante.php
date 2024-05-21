<?php 
session_start();
require_once "../../clases/Conexion.php";
require_once "../../clases/Estudiantes.php";

$nombres=$_POST['nombres'];
$apellidos=$_POST['apellidos'];
$fechaNacimiento=$_POST['fechaNacimiento'];
$genero=$_POST['genero'];
$ci=$_POST['ci'];
$direccion=$_POST['direccion'];
$vive=$_POST['vive'];
$nacionalidad=$_POST['nacionalidad'];
$curso=$_POST['curso'];
$idusuario=$_SESSION['iduser'];


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
$obj= new estudiantes();
echo $obj->agregaEstudiante($datos);

 ?>
