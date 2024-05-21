<?php 
session_start();
if(isset($_SESSION['usuario'])){

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Inicio</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>
		<div class="container">


			<div class="row" align="center">
				<div class="col-md-4">
					<div class="thumbnail">
						<img src="../img/ok.png" alt="...">
						<div class="caption">
							<h3>POBLACIÓN BENEFICIARIA</h3>
							<p>
							La población beneficiaria del gabinete está conformada por niño/as de 0 a 12 años del nivel primario de diferentes unidades educativas así también los hijos de los estudiantes de las diferentes unidades académicas de nuestra Universidad, principalmente de la Carrera de Pedagogía</p>
							<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
						</div>

		
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img src="../img/ok.png" alt="...">
						<div class="caption">
							<h3>MISIÓN</h3>
							<p>
							El gabinete tiene el compromiso de brindar especializada a niños, niñas y padres de familia desarrollando una orientación psicopedagógica a través de estimulación temprana y atención de dificultades de aprendizaje para contribuir al desarrollo integral del niño, la familia y comunidad.</p>
							<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
						</div>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="thumbnail">
						<img src="../img/ok.png" alt="...">
						<div class="caption">
							<h3>VISIÓN</h3>
							<p>
							Es un gabinete psicopedagógico especializado en estimulación temprana, atención de dificultades de aprendizaje y orientación educativa, con reconocimiento nivel nacional que aporte de manera eficiente a la formación integral de persona y sociedad..</p>
							<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
						</div>
					</div>
				</div>
			</div>
		</body>
		</html>
		<?php 
	}else{
		header("location:../index.php");
	}
?>