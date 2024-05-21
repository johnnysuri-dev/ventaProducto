<?php 
require_once "../../clases/Conexion.php";
require_once "../../clases/Estudiantes.php";


$datos=array(
	$_POST['idestudiante'],
	$_POST['nombresU'],
	$_POST['apellidosU'],
	$_POST['fechaNacimientoU'],
	$_POST['generoU'],
	$_POST['ciU'],
	$_POST['direccionU'],
	$_POST['viveU'],
	$_POST['nacionalidadU']
	//$_POST['cursoU']
		);
$obj=new estudiantes();

echo $obj->actualizaEstudiante($datos);
 ?>