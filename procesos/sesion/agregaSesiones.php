<?php 
session_start();
require_once "../../clases/Conexion.php";
require_once "../../clases/Sesion.php";

//$idest=$_POST['idest'];
//$nombres=$_POST['nombres'];
//$apellidos=$_POST['apellidos'];
//$estado="Adentido";

$fecha=$_POST['fecha'];
$objetivo=$_POST['objetivo'];
$actividad=$_POST['actividad'];
$resultado=$_POST['resultado'];
$apoyo=$_POST['apoyo'];
$diagnostico=$_POST['diagnostico'];
$comportamiento=$_POST['comportamiento'];
$idest=$_POST['idest'];
$idusuario=$_SESSION['iduser'];


	//$nombres,
	//$apellidos,	
	//$idusuario,

$datos=array(	
	$fecha,
	$objetivo,
	$actividad,
	$resultado,
	$apoyo,
	$diagnostico,
	$comportamiento,
	$idest,
	$idusuario
			);

$obj= new sesiones();
echo $obj->agregaSesiones($datos);

 ?>

