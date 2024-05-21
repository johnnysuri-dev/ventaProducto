<?php 
session_start();
if (isset($_SESSION['usuario'])) {
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Estudiante</title>
		<?php require_once "menu.php"; ?>
		<?php require_once "../clases/Conexion.php"; ?>		
	</head>
	<body>
		<div class="container">
			<h1>Lista Tutores Padre/Madre</h1>
			<div class="row">
				<div class="col-sm-12">
					<div id="tablaDatosFamiliaLoad"></div>
				</div>
			</div>
		</div>

			<!-- Modal -->
		<div class="modal fade" id="actualizaEstudiante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Actualiza estudiante</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="frmEstudianteU">
						<input type="text" hidden="" id="idestudiante" name="idestudiante">
						<label>Apellido Paterno</label>
						<input type="text" class="form-control input-sm" name="apellido_paternoU" id="apellido_paternoU">
						<label>Apellido Materno</label>
						<input type="text" class="form-control input-sm" name="apellido_maternoU" id="apellido_maternoU">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" name="nombresU" id="nombresU">
						<label>Pais</label>
						<input type="text" class="form-control input-sm" name="paisU" id="paisU">
						<label>Departamento</label>
						<input type="text" class="form-control input-sm" name="departamentoU" id="departamentoU">
						<label>Provinvia</label>
						<input type="text" class="form-control input-sm" name="provinciaU" id="provinciaU">
						<label>Localidad</label>
						<input type="text" class="form-control input-sm" name="localidadU" id="localidadU">
						<p></p>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaEstudiante" class="btn btn-secondary" data-dismiss="modal">Guardar</button>

					</div>
				</div>
			</div>
		</div> <!--cierra el modal-->
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){

		$('#tablaDatosFamiliaLoad').load("datosFamilia/tablaDatosFamilia.php");

			$('#btnAgregaTutor').click(function(){

				vacios=validarFormVacio('frmTutores');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmTutores').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/tutores/agregaTutor.php",
					success:function(r){
						if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmTutores')[0].reset();

					$('#tablaDatosFamiliaLoad').load("datosFamilia/tablaDatosFamilia.php");
					alertify.success("tutor registrado con exito :D");
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
			$('#btnActualizaEstudiante').click(function(){

				datos=$('#frmEstudianteU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/estudiantes/actualizaEstudiante.php",
					success:function(r){
						if(r==1){

							$('#tablaDatosFamiliaLoad').load("datosFamilia/tablaDatosFamilia.php");
							alertify.success("actualizo con exito :D");
						}else{
							alertify.error("No pudo actualizar :(");
						}

					}
				});
			});

		});
	</script>
	<script type="text/javascript">
		function agregaDato(idEstudiante,apellidop,apellidom,nombres,pais,departamento,provincia,localidad){
			$('#idestudiante').val(idEstudiante);
			$('#apellido_paternoU').val(apellidop);
			$('#apellido_maternoU').val(apellidom);
			$('#nombresU').val(nombres);
			$('#paisU').val(pais);
			$('#departamentoU').val(departamento);
			$('#provinciaU').val(provincia);
			$('#localidadU').val(localidad);
		}
		function eliminaEstudiante(idestudiante){
			alertify.confirm('¿Desea eliminar esta estudiante?', function(){ 
				$.ajax({
					type:"POST",
					data:"idestudiante=" + idestudiante,
					url:"../procesos/estudiantes/eliminarEstudiante.php",
					success:function(r){
						if(r==1){
							$('#tablaDatosFamiliaLoad').load("datosFamilia/tablaDatosFamilia.php");
							alertify.success("Eliminado con exito!!");
						}else{
							alertify.error("No se pudo eliminar :(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo !')
			});
		}

	</script>



<?php 
}
else{
	header("location:../index.php");
}
?>