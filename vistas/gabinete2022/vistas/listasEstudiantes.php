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
			<h1>Gestion de Estudiante</h1>
			<div class="row">
				<span class="btn btn-info btn-xs" data-toggle="modal" data-target="#crearEstudiante" onclick="agregaDato('<?php echo $ver[0] ?>','<?php echo $ver[1] ?>','<?php echo $ver[2] ?>','<?php echo $ver[3] ?>','<?php echo $ver[4] ?>','<?php echo $ver[5] ?>','<?php echo $ver[6] ?>','<?php echo $ver[7] ?>','<?php echo $ver[8] ?>','<?php echo $ver[9] ?>')">Nuevo estudiante
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
				<div class="col-sm-12">
					<div id="gestionEstudianteLoad"></div>
				</div>
			</div>
		</div>
		<!-- Modal crear-->
		<div class="modal fade" id="crearEstudiante" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Crear Estudiante</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="frmEstudiante">
							<div class="row">
								<div class="col-md-6">
									<label class="control-label">Nombres</label>
									<input class="form-control" type="text" id="nombres" name="nombres" placeholder="Nombres">
									<label class="control-label">Apellidos</label>
									<input class="form-control" type="text" id="apellidos" name="apellidos" placeholder="Apellidos">
									<label class="control-label"> Fecha de Nacimiento</label>
									<input class="form-control" type="date" id="fechaNacimiento" name="fechaNacimiento" placeholder="Nacimiento">
									<label class="control-label"> Genero</label>
									<select name="genero" id="genero" class=" form-control">
										<option value="A">Seleccione genero</option>
										<option value="Masculino">Masculino</option>
										<option value="Femenino">Femenino</option>
									</select>
									<label class="control-label"> CI</label>
									<input class="form-control" id="ci" name="ci" type="text" placeholder="Ci">
								</div>
								<div class="col-md-6">  <!---hay que añadir curso -->
									<label class="control-label"> Direccion</label>
									<textarea class="form-control" rows="4" id="direccion" name="direccion" placeholder="Describa su direccion"></textarea>

									<label class="control-label"> Con quien vive</label>
									<select name="vive" id="vive" class=" form-control">
										<option value="A">Seleccione</option>
										<option value="Padre">Padre</option>
										<option value="Madre">Madre</option>
										<option value="Otros">Otros</option>
										<option value="Padre-Madre">Padre-Madre</option>
									</select>

									<label class="control-label"> Nacionalidad</label>
									<select name="nacionalidad" id="nacionalidad" class=" form-control">
										<option value="A">Seleccione Nacionalidad</option>
										<option value="Boliviano">Boliviano</option>
										<option value="Peruano">Peruano</option>
										<option value="Brasilero">Brasilero</option>
										<option value="Chileno">Chileno</option>     
										<option value="Argentino">Argentino</option>
										<option value="Paraguayo">Paraguayo</option>
										<option value="Otros">Otros</option>
									</select>
									<label>Curso</label>
									<select class="form-control input-sm" id="curso" name="curso">
										<option value="A">Selecciona Curso</option>
										<?php 

										while($ver=mysqli_fetch_row($result)): ?>
											<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
										<?php endwhile; ?>
									</select>

								</div>    <!-- cerramos col-->    
							</div>  <!-- row superior-->
							<br>
							<div class="tile-footer">
								<button class="btn btn-primary" id="btnRegistroEstudiante" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="listasEstudiantes.php"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
							</div> 
						</form>
					</div>
					
				</div>
			</div>
		</div> <!--cierra el modal crear-->
		<!-- Modal  actualizar-->
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
							<div class="col-md-6">
								<input type="text" hidden="" id="idestudiante" name="idestudiante">
								<label class="control-label">Nombres</label>
								<input class="form-control" type="text" id="nombresU" name="nombresU" placeholder="Nombres">
								<label class="control-label">Apellidos</label>
								<input class="form-control" type="text" id="apellidosU" name="apellidosU" placeholder="Apellidos">
								<label class="control-label"> Fecha de Nacimiento</label>
								<input class="form-control" type="date" id="fechaNacimientoU" name="fechaNacimientoU" placeholder="Nacimiento">
								<label class="control-label"> Genero</label>
								<select name="generoU" id="generoU" class=" form-control">
									<option value="A">Seleccione genero</option>
									<option value="Masculino">Masculino</option>
									<option value="Femenino">Femenino</option>
								</select>
								<label class="control-label"> CI</label>
								<input class="form-control" id="ciU" name="ciU" type="text" placeholder="Ci">
							</div>
							<div class="col-md-6">  <!---hay que añadir curso -->
								<label class="control-label"> Direccion</label>
								<textarea class="form-control" rows="4" id="direccionU" name="direccionU" placeholder="Describa su direccion"></textarea>
								<label class="control-label"> Con quien vive</label>
								<select name="viveU" id="viveU" class=" form-control">
									<option value="A">Seleccione</option>
									<option value="Padre">Padre</option>
									<option value="Madre">Madre</option>
									<option value="Otros">Otros</option>
									<option value="Padre-Madre">Padre-Madre</option>
								</select>
								<label class="control-label"> Nacionalidad</label>
								<select name="nacionalidadU" id="nacionalidadU" class=" form-control">
									<option value="A">Seleccione Nacionalidad</option>
									<option value="Boliviano">Boliviano</option>
									<option value="Peruano">Peruano</option>
									<option value="Brasilero">Brasilero</option>
									<option value="Chileno">Chileno</option>     
									<option value="Argentino">Argentino</option>
									<option value="Paraguayo">Paraguayo</option>
									<option value="Otros">Otros</option>
								</select>
								<label>Curso</label>
								<input class="form-control" type="text" id="cursoU" name="cursoU" placeholder="Apellidos">
								<!--
								<select name="cursoU" id="cursoU" class=" form-control">
									<option value="A">Selecciona Curso</option>
									<?php //while($ver=mysqli_fetch_row($result)): ?>
										<option value="<?php //echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
									<?php //endwhile; ?>
								</select>-->

							</div>    <!-- cerramos col-->  
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnActualizaEstudiante" class="btn btn-secondary" data-dismiss="modal">Guardar</button>
					</div>
				</div>
			</div>
		</div> <!--cierra el modal-->

		<!-- Modal  datosfamilia------------------------------------------------------------------>
		<div class="modal fade" id="añadirDatosFamilia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="exampleModalLabel">Añadir Datos del Tutor</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="frmDatosFamilia">
								<input type="text" id="idest" name="idest">
								<input type="text" id="nom" name="nom">
								<input type="text" id="ape" name="ape">
							<div class="col-md-6">
								
								<label class="control-label">Tutor padre</label>
								<input class="form-control" type="text" id="tutorpadre" name="tutorpadre" placeholder="Tutor padre">
								<label class="control-label"> Telefono 1</label>
								<input class="form-control" type="text" id="telefono1" name="telefono1" placeholder="telefono1">
								<label class="control-label"> Ocupacion padre</label>
								<input class="form-control" id="ocupacionpadre" name="ocupacionpadre" type="text" placeholder="Ocupacion padre">
								
							</div>
							<div class="col-md-6">
								<label class="control-label">Tutor madre</label>
								<input class="form-control" type="text" id="tutormadre" name="tutormadre" placeholder="Tutor madre">	
								<label class="control-label"> Telefono 2</label>
								<input class="form-control" type="text" id="telefono2" name="telefono2" placeholder="Telefono2">
								<label class="control-label"> Ocupacion madre</label>
								<input class="form-control" id="ocupacionmadre" name="ocupacionmadre" type="text" placeholder="Ocupacion madre">
							</div>     
						</form>
					</div>
					<br>
					<div class="modal-footer">
						<button type="button" id="btnDatosFamilia" class="btn btn-primary" data-dismiss="modal">Guardar</button>
					</div>
				</div>
			</div>
		</div> <!--cierra el modal-->
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#gestionEstudianteLoad').load("estudiantes/gestionEstudiante.php");

			$('#btnRegistroEstudiante').click(function(){

				vacios=validarFormVacio('frmEstudiante');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}
				datos=$('#frmEstudiante').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/estudiantes/agregaEstudiante.php",
					success:function(r){
								//alert(r);//prueba para ver los errores
								if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmEstudiante')[0].reset();

					$('#gestionEstudianteLoad').load("estudiantes/gestionEstudiante.php");
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

						$('#gestionEstudianteLoad').load("estudiantes/gestionEstudiante.php");
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
							$('#gestionEstudianteLoad').load("estudiantes/gestionEstudiante.php");
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

	<!--crear datos familia-->
		<script type="text/javascript">

		$(document).ready(function(){

			$('#gestionEstudianteLoad').load("estudiantes/gestionEstudiante.php");

			$('#btnDatosFamilia').click(function(){

				vacios=validarFormVacio('frmDatosFamilia');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}
				datos=$('#frmDatosFamilia').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/datosFamilia/agregaDatosFamilia.php",
					success:function(r){
								alert(r);//prueba para ver los errores
								if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmDatosFamilia')[0].reset();

					$('#gestionEstudianteLoad').load("estudiantes/gestionEstudiante.php");
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