<?php 
session_start();
if (isset($_SESSION['usuario'])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Estudiante</title>
		<?php require_once "menu.php"; ?>
		<?php require_once "../clases/Conexion.php"; 
		$c=new conectar();
		$conexion=$c->conexion();
		$sql="SELECT id_cursos,nombre from cursos";

		$result= mysqli_query($conexion, $sql);
		?>		
	</head>
	<body>
		<div class="container">
			<h1>Sesiones Programadas</h1>
			<div class="row">
				<div class="col-sm-12">
					<div id="sesionesLoad"></div>
				</div>
			</div>
		</div>
		<!---aqui se inserta modal -->
		<div class="modal fade" id="sesiones" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Registro de Entrevista</h3>
					</div>

					<form id="frmSesiones">
						<div class="col-md-12">
							<label class="control-label">Datos del estudiante</label>
							<input hidden="" type="text" id="idest" name="idest">
							<input class="form-control" type="text" id="nom" name="nom" disabled>
							<input class="form-control" type="text" id="ape" name="ape" disabled>

							<label class="control-label">Fecha Sesion</label>
							<input class="form-control" type="date" id="fecha" name="fecha">
							<label class="control-label">Objetivo</label>
							<select name="objetivo" id="objetivo" class=" form-control">
								<option value="Evaluacion Entrevista">Evaluacion Entrevista</option>
								<option value="Valoracion Psicopedagogico">Valoracion Psicopedagogico</option>
								<option value="Valoracion Emocional">Valoracion Emocional</option>
								<option value="Evaluacion Text">Evaluacion Text</option>
								<option value="Otros">Otros</option>
							</select>
							<label class="control-label"> Actividad</label>
							<textarea class="form-control" type="date" id="actividad" name="actividad" placeholder=""></textarea>
							<label class="control-label"> Resultados</label>
							<textarea class="form-control" id="resultado" name="resultado" type="text" placeholder=""></textarea>
							<label class="control-label"> Requiere apoyo</label>
							<select name="apoyo" id="apoyo" class=" form-control">
								<option value="Ninguno">Ninguno</option>
								<option value="Lenguaje">Lenguaje</option>
								<option value="Ciencias exactas">Ciencias exactas</option>
								<option value="Ciencias">Ciencias</option>
								<option value="Emocional">Emocional</option>
								<option value="Social">Social</option>
								<option value="Otros">Otros</option>
							</select>
							<label class="control-label">Diagnostico</label>
							<select name="diagnostico" id="diagnostico" class=" form-control">
								<option value="Ninguno">Ninguno</option>
								<option value="TDH">TDH</option>
								<option value="Discapacidad fisica">Discapacidad fisica</option>
								<option value="Discapacidad sensorial">Discapacidad sensorial</option>     
								<option value="Discapacidad intelectual">Discapacidad intelectual</option>
								<option value="Discapacidad visceral">Discapacidad visceral</option>
								<option value="Discapacidad múltiple">Discapacidad múltiple</option>
								<option value="Otros">Otros</option>
							</select>
							<label class="control-label"> Comportamiento en sesion</label>
							<select name="comportamiento" id="comportamiento" class=" form-control">
								<option value="A">Seleccione </option>
								<option value="Tuvo problemas">Tuvo problemas</option>
								<option value="Regular">Regular</option>
								<option value="Activo">Activo</option>
								<option value="Altamente activo">Altamente activo</option>     
								<option value="Depresivo">Depresivo</option>
							</select>
						</div>    <!-- cerramos col-->  
					</form>

					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="button" id="btnSesiones" class="btn btn-primary" data-dismiss="modal">Guardar</button>
					</div>
				</div>
			</div>
		</div>
		<!---aqui se cierra modal -->
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#sesionesLoad').load("sesiones/tablaSesiones.php");
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
			$('#btnActualizaEstudiante').click(function(){

				datos=$('#frmEstudianteU').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/estudiantes/actualizaEstudiante.php",
					success:function(r){
					alert(r);//prueba para ver los errores
					if(r==1){

						$('#sesionesLoad').load("sesiones/tablaSesiones.php");
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
		function agregaDato(idEstudiante,nombres,apellidos,fecha_nacimiento,genero,ci,direccion,con,nacionalidad,curso){
			$('#idestudiante').val(idEstudiante);
			$('#nombresU').val(nombres);
			$('#apellidosU').val(apellidos);
			$('#fecha_nacimientoU').val(fecha_nacimiento);
			$('#generoU').val(genero);
			$('#ciU').val(ci);
			$('#direccionU').val(direccion);
			$('#viveU').val(con);
			$('#nacionalidadU').val(nacionalidad);
			$('#cursoU').val(curso);
		}
		function eliminaEstudiante(idestudiante){
			alertify.confirm('¿Desea eliminar esta estudiante?', function(){ 
				$.ajax({
					type:"POST",
					data:"idestudiante=" + idestudiante,
					url:"../procesos/estudiantes/eliminarEstudiante.php",
					success:function(r){
						if(r==1){
							$('#sesionesLoad').load("sesiones/tablaSesiones.php");
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

	<!--carga datos-->
	<script type="text/javascript">
		function cargarDatos(idEstudiante,nom,ape){
			$('#idest').val(idEstudiante);
			$('#nom').val(nom);
			$('#ape').val(ape);
		}
	</script>

	<?php 
}
else{
	header("location:../index.php");
}
?>