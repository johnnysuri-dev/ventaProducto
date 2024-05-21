<?php 
session_start();
if (isset($_SESSION['usuario'])) {

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Ventas</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>
		<div class="container">
			<h1>Administracion de sesiones</h1>
			<div class="row">
				<div class="col-sm-12">
					<span class="btn btn-primary" id="programadasBtn">Sesiones programadas</span>
					<span class="btn btn-success" id="realizadasBtn">Sesiones realizadas</span>
					<span class="btn btn-danger" id="NoPresentaronBtn">Sesiones no se presentaron</span>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div id="programadas"> </div>
					<div id="realizadas"> </div>
					<div id="NoPresentaron"> </div>
				</div>
			</div>
		</div>
		<!------------------------------>
		<!---aqui se inserta modal -->
		<div class="modal fade" id="sesiones" role="dialog">
			<div class="modal-dialog" style="width:1250px;">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Registro de Entrevista</h3>

						<form id="frmEntrevista">					

							<div class="col-sm-4">
								<label class="control-label">Datos del estudiante</label>
								<input hidden="" type="text" id="idest" name="idest">
								<input class="form-control" type="text" id="nom" name="nom" disabled>
								<input class="form-control" type="text" id="ape" name="ape" disabled>
								<label class="control-label">Datos clinicos</label>
								<select name="datosClinicos" id="datosClinicos" class=" form-control">
									<option value="No hay datos clínicos">No hay datos clínicos</option>
									<option value="Si hay datos clínicos">Si hay datos clínicos</option>
									<option value="Otros">Otros</option>
								</select>

								<label class="control-label"> Desarrollo cognitivo</label>
								<textarea class="form-control" type="date" id="desarrolloCognitivo" name="desarrolloCognitivo" placeholder="" rows="7" cols="50">Concluyendo, sobre el nivel cognitivo del estudiante podemos decir que los resultados obtenidos en esta escala son indicativos de que presenta un funcionamiento intelectual Normal, encontrándose más debilitado el aspecto relacionado con la velocidad de procesamiento</textarea>

								<label class="control-label"> <b>Desarrollo Motor</b></label><br>

								<label class="control-label"> Motricidad Gruesa</label>
								<textarea class="form-control" id="motricidadGruesa" name="motricidadGruesa" type="text" placeholder="" rows="5">Coordinación dinámica general: No se observan trastornos en la marcha, carrera o salto; es capaz de sortear obstáculos al caminar, corretear se observa una adecuada alternancia de brazos y pies al caminar</textarea>

								<label class="control-label"> Motricidad Fina</label>
								<textarea class="form-control" id="motricidadFina" name="motricidadFina" type="text" placeholder="" rows="5">Ejecuta los trazos con presión y agilidad adecuada. Presenta un trazo ágil y controlado. Coge adecuadamente el lápiz y realiza la pinza. Tiene buena coordinación visomotora</textarea>
							</div>
							<div class="col-sm-4">


							</div>
						</form>

						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="button" id="btnEntrevista" class="btn btn-primary" data-dismiss="modal">Guardar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!---aqui se cierra modal -->


		<!---------modal de reprogramacion---------------->
		<div class="modal fade" id="sesiones1" role="dialog">
			<div class="modal-dialog" style="width:1250px;">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title">Reprogramacion</h3>

						<form id="frmReprogramacion">					

							<div class="col-sm-4">
								<label class="control-label">Datos del estudiante</label>
								<input hidden="" type="text" id="idest" name="idest">
								<input class="form-control" type="text" id="nom" name="nom" disabled>
								<input class="form-control" type="text" id="ape" name="ape" disabled>
								<label class="control-label">Datos clinicos</label>
								<select name="datosClinicos" id="datosClinicos" class=" form-control">
									<option value="No hay datos clínicos">No hay datos clínicos</option>
									<option value="Si hay datos clínicos">Si hay datos clínicos</option>
									<option value="Otros">Otros</option>
								</select>
								<input class="form-control" type="text" id="ape" name="ape" disabled>
								<input class="form-control" type="text" id="ape" name="ape" disabled>
							</div>
						</form>

						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="button" id="btnReprogramacion" class="btn btn-primary" data-dismiss="modal">Guardar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!---aqui se cierra modal -->



	</body>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#programadasBtn').click(function(){
				esconderSeccionVenta();

				$('#programadas').load("sesiones/SesionesProgramadas.php");
				$('#programadas').show();
					$('#programadas').load("sesiones/SesionesProgramadas.php");// ultimo
				});
			$('#realizadasBtn').click(function(){
				esconderSeccionVenta();
				$('#programadas').load("sesiones/SesionesRealizadas.php");
				$('#realizadas').show();

			});
			$('#NoPresentaronBtn').click(function(){
				esconderSeccionVenta();
				$('#programadas').load("sesiones/SesionesNoPresentaron.php");
				$('#NoPresentaron').show();

			});
		});

		function esconderSeccionVenta(){
			$('#ventaProductos').hide();
			$('#ventaHechas').hide();
		}
	</script>
	<script type="text/javascript">
		function cargarDatos(idEstudiante,nom,ape){
			$('#idest').val(idEstudiante);
			$('#nom').val(nom);
			$('#ape').val(ape);
		}
	</script>
	<script type="text/javascript">
		function cargarDatosReprogramacion(idEstudiante,nom,ape){
			$('#idest').val(idEstudiante);
			$('#nom').val(nom);
			$('#ape').val(ape);
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#sesionesLoad').load("sesiones/tablaSesiones.php");
			$('#btnEntrevista').click(function(){

				vacios=validarFormVacio('frmEntrevista');

				if(vacios > 0){
					alertify.alert("Debes llenar todos los campos!!");
					return false;
				}
				datos=$('#frmEntrevista').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../procesos/sesion/agregaEntrevista.php",
					success:function(r){
								alert(r);//prueba para ver los errores
								if(r==1){
					//esta linea nos permite limpiar el formulario al insetar un registro
					$('#frmEntrevista')[0].reset();
					$('#sesionesLoad').load("sesiones/tablaSesiones.php");
					alertify.success("Se creocon exito :D");
				}else{
					alertify.error("Fallo al insertar :(");
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

