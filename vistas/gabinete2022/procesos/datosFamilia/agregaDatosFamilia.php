<?php 
session_start();
require_once "../../clases/Conexion.php";
require_once "../../clases/DatosFamilia.php";

$padre=$_POST['tutorpadre'];
$madre=$_POST['tutormadre'];
$tef1=$_POST['telefono1'];
$tef2=$_POST['telefono2'];
$ocupacionp=$_POST['ocupacionpadre'];
$ocupacionm=$_POST['ocupacionmadre'];
$idest=$_POST['idest'];

$datos=array(	
	$padre,
	$madre,
	$tef1,
	$tef2,
	$ocupacionp,
	$ocupacionm,
	$idest
);
$obj= new datosfamilias();
echo $obj->agregaDatosFamilia($datos);

?>
