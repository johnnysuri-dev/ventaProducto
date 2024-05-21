<?php 
require_once "../../clases/Conexion.php";
require_once "../../clases/Estudiantes.php";

//$id=$_POST['idestudiante'];

$obj=new estudiantes();
echo $obj->eliminaEstudiante($_POST['idestudiante']);
//echo $obj->eliminaEstudiante($id);

?>