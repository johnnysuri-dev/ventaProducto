<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$id_estudiante = $_POST['id_estudiante'];
	$estado="Atender";

	$sql = "INSERT INTO events(title, start, end, color,id_estudiante, estado) values ('$title', '$start', '$end', '$color','$id_estudiante','$estado' )";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	//$sql="SELECT id_estudiante,nombres,apellidos from estudiante";
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
