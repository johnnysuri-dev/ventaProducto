<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		
 ?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>inicio</title>
			<?php require_once "menu.php"; ?>
		</head>
		<body>
			<h1>gestion de clientes</h1>


		</body>
		</html>
<?php 
	}else{
		header("location:../index.php");
	}
 ?>