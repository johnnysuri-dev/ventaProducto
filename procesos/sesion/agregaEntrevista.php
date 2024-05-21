<?php 
session_start();
require_once "../../clases/Conexion.php";
require_once "../../clases/Entrevistas.php";
require_once "../../clases/Events.php";

//$idest=$_POST['idest'];
//$nombres=$_POST['nombres'];
//$apellidos=$_POST['apellidos'];
//$estado="Adentido";
//$fecha=date('Y-m-d');
$datosClinicos=$_POST['datosClinicos'];
$desarrolloCognitivo=$_POST['desarrolloCognitivo'];
$motricidadGruesa=$_POST['motricidadGruesa'];
$motricidadFina=$_POST['motricidadFina'];
$desarrolloSensorial=$_POST['desarrolloSensorial'];
$desarrolloComunicativo=$_POST['desarrolloComunicativo'];
$desarrolloSocial=$_POST['desarrolloSocial'];
$observaciones=$_POST['observaciones'];
$tiene=$_POST['tiene'];
$compromiso=$_POST['compromiso'];
$idest=$_POST['idest'];
$idusuario=$_SESSION['iduser'];


$datos=array(	
	//$fecha,
	$datosClinicos,
	$desarrolloCognitivo,
	$motricidadGruesa,
	$motricidadFina,
	$desarrolloSensorial,
	$desarrolloComunicativo,
	$desarrolloSocial,
	$observaciones,
	$tiene,
	$compromiso,
	$idest,
	$idusuario
			);

$obj= new entrevistas();
//echo $obj->agregaEntrevistas($datos);
$inst= $obj->agregaEntrevistas($datos);
echo $inst;
	if ($inst==1) {
		$datos=array(
			$datosClinicos,
			$desarrolloCognitivo,
			$motricidadGruesa,
			$motricidadFina,
			$desarrolloSensorial,
			$desarrolloComunicativo,
			$desarrolloSocial,
			$observaciones,
			$tiene,
			$compromiso,
			$idest,
			$idusuario
			);
	$obj= new events();
	$inst2= $obj->actualizaEstado($datos);
	}else{
		echo "Aun falta";
		}


 ?>

