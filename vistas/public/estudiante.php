
	<!DOCTYPE html>
	<html>
	<head>
		<title>Estudiante</title>
		<?php require_once "menuPublic.php"; ?>
		<?php require_once "../../clases/Conexion.php";
		$c=new conectar();
		$conexion=$c->conexion();
		$sql="SELECT id_cursos,nombre from cursos";

		$result= mysqli_query($conexion, $sql);
		?>		
	</head>
	<body>
		<div class="container">
			<h1>Registro de Estudiante</h1>
			<div class="row">
				<div class="col-sm-4">
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
							<button class="btn btn-primary" id="btnRegistroEstudiante" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
						</div> 
					</form>
				</div>
				<div class="col-sm-6">
					<div id="tablaEstudianteLoad"></div>
				</div>
			</div>
		</div>

		<!-- Modal -->
		 <!--cierra el modal-->
	</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#tablaEstudianteLoad').load("../estudiantes/tablaEstudiantes.php");

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
					url:"../../procesos/estudiantes/agregaEstudiantePublic.php",
					success:function(r){
								alert(r);//prueba para ver los errores
								if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmEstudiante')[0].reset();

					$('#tablaEstudianteLoad').load("estudiantes/tablaEstudiantes.php");
					//alertify.success("Estudiante registrado con exito :D");
					alertify.alert('Mensaje', 'Ha registrado con exito!', function(){ alertify.success('Ok'); });
Run
 Overloads
				}else{
				//	alertify.error("Fallo al registrar :(");
					alertify.alert('Notificacion', 'Usted ha registrado con exito!', function(){ alertify.success('Ok'); });
						$('#frmEstudiante')[0].reset();
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
							$('#tablaEstudianteLoad').load("estudiantes/tablaEstudiantes.php");
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
