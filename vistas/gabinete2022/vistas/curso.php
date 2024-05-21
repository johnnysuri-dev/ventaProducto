<?php 
session_start();
if (isset($_SESSION['usuario'])) {
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Unidad Educativa</title>
		<?php require_once "menu.php"; ?>
		<?php require_once "../clases/Conexion.php"; ?>		
	</head>
	<body>
		<div class="container">
			<h1>Crear cursos</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCurso">
						<label>Nombre del curso (6to Primaria B)</label>
						<input type="text" class="form-control input-sm" name="curso" id="curso">
						<p></p>
						<span class="btn btn-primary" id="btnAgregaCurso">Agregar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tablaCurso"></div>
				</div>
			</div>
		</div>
	</body>
	</html>
<script type="text/javascript">
	$(document).ready(function(){
	$('#tablaCurso').load("curso/tablaCurso.php");
	$('#btnAgregaCurso').click(function(){
		acios=validarFormVacio('frmCurso');
			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}
		datos=$('#frmCurso').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"../procesos/cursos/agregaCurso.php",
			success:function(r){
				if (r==1) {
					$('#tablaCurso').load("curso/tablaCurso.php");
					alertify.success(" se inserto de forma exitosa");
				}else{
					alertify.error("fallo al agregar");
				}

			}
		});
	});
	
	});
</script>
<?php 
}
else{
	header("location:../index.php");
}
?>