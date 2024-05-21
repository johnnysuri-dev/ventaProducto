	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<title>Login de usuario</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css"> <!--A;ADIR -->
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
	<script src="librerias/tabs/bootstrap.min.js"></script>

</head>
<body>
	<div id="nav">
		<div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php"><img class="img-responsive logo img-thumbnail" src="img/ok.png" alt="" width="100px" height="100px"></a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">

						<li class="active"><a href="vistas/public/estudiante.php"><span class="glyphicon glyphicon-home"></span> Postulacion</a>
						</li>
						<li class="active"><a href="vistas/public/verificar.php"><span class="glyphicon glyphicon-home"></span> Verificar postulacion</a>
						</li>
						<li class="dropdown" >
							<a href="#" style="color: red"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Ingresar: <?php // echo $_SESSION['usuario']; ?>  <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li> <a style="color: red" href="login.php"><span class="glyphicon glyphicon-off"></span> login</a></li>
							</ul>
						</div>
					</ul>
				</div>			
			</div>
		</div> <!--nav-->
		
		<!--------------------------------------------------->
		<div class="container">
			<div class="row" align="">
				<div class="col-md-6">
					<div class="thumbnail">
						
						<div class="caption">
							<h3>Estudiantes Nuevos</h3>
							<ol>
								<li>Libreta escolar año anterior vencido </li>
								<li>Fotocopia Certificado de nacimiento </li>
								<li>Fotocopia C.I. padres o apoderado
								</li>
								<li>Fotocopia C.I. del estudiante
								</li>
								<li>Reglamento para estudiantes y padres de familia debidamente firmado (Obtiene en laUnidad Educativa)
									Compromisos académicos de estudiantes y padres de familia debidamente firmado (Obtiene en la Unidad Educativa)
								Formulario de Actividades que fortalecen los principios y Valores Cristianos debidamente firmados ( Obtiene en la Unidad Educativa)</li>
								<li>CERTIFICADO DE RETIRO DEL OTRO COLEGIO</li>
								<li>LA PRESENCIA DEL ESTUDIANTE ES OBLIGATORIA PARA LA ENTREVISTA</li>
								<li>CANCELAR 1RA Y ÚLTIMA MENSUALIDAD DE MANERA OBLIGATORIA.</li>
								<li>Todos los documentos presentar en un folder amarillo.</li>


							</ol>

							<p>Debe llenar su Formulario de postulacion y agendar su cita para la entrevista</p>
							<p><a href="vistas/public/estudiante.php" class="btn btn-primary" role="button">Postulacion</a> <a href="public/verificar.php" class="btn btn-default" role="button">Verficar postulacion</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="thumbnail">

						<div class="caption">
							<h3>Estudiantes Antiguos</h3>

							<ol>
								<li>Actualizar datos del Formulario RUDE en caso de cambio domicilio o telefono celula </li>
								<li>Fotocopia Certificado de nacimiento </li>
								<li>Reglamento para estudiantes y padres de familia debidamente firmado (Obtiene en laUnidad Educativa)
									Compromisos académicos de estudiantes y padres de familia debidamente firmado (Obtiene en la Unidad Educativa)</li>
								<li>Formulario de Actividades que fortalecen los principios y Valores Cristianos debidamente firmados ( Obtiene en la Unidad Educativa)</li>	
							
								<li>CERTIFICADO DE RETIRO DEL OTRO COLEGIO</li>
								<li>LA PRESENCIA DEL ESTUDIANTE ES OBLIGATORIA PARA LA ENTREVISTA</li>
								<li>CANCELAR 1RA Y ÚLTIMA MENSUALIDAD DE MANERA OBLIGATORIA.</li>
								<li>Todos los documentos presentar en un folder amarillo.</li>


							</ol>

				
							<p><a href="#" class="btn btn-primary" role="button">mas informacion </a></p>
						</div>
					</div>
				</div>
			</div>

		</div>

	</body>
	</html>


