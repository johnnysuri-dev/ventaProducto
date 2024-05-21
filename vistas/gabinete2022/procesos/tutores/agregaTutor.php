<?php 
session_start();
require_once "../../clases/Conexion.php";
require_once "../../clases/Tutores.php";
			
//		SELECT `id_tutor`, `apellido_paterno`, `apellido_materno`, `nombres`, `ci`, `complemento`, `fecha_nacimiento`, `email`, `telefono` FROM `tutor` WHERE 1
	
$apellido_paterno=$_POST['apellido_paterno'];
$apellido_materno=$_POST['apellido_materno'];
$nombres=$_POST['nombres'];
$ci=$_POST['ci'];
$complemento=$_POST['complemento'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];


$datos=array(	
			$apellido_paterno,
			$apellido_materno,
			$nombres,
			$ci,
			$complemento,
			$fecha_nacimiento,
			$email,
			$telefono

			);

$obj= new tutores();
echo $obj->agregaTutor($datos);

 ?>
