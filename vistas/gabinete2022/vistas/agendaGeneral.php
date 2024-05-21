<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Estudiante</title>
		<?php  require_once "menu.php"; ?>
		
			
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="agendaLoad"></div>
				</div>
			</div>
		</div>
		<!---aqui se inserta modal -->
		
		<!---aqui se cierra modal -->
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#agendaLoad').load("FullCalendar/index.php");
			$('#btnSesiones').click(function(){

				vacios=validarFormVacio('frmSesiones');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}
				datos=$('#frmSesiones').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/sesion/agregaSesiones.php",
					success:function(r){
								alert(r);//prueba para ver los errores
								if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmSesiones')[0].reset();
					$('#sesionesLoad').load("sesiones/tablaSesiones.php");
					alertify.success("Se creocon exito :D");
				}else{
					alertify.error("Fallo al actualizar :(");
				}
			}
		});
			});
		});
	</script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#clienteVenta').select2();
			$('#productoVenta').select2();
		});

	</script>
	

	<?php 
}
else{
	header("location:../index.php");
}
?>