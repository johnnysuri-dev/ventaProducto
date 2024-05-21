	
<!DOCTYPE html>
<html>
<head>
<title>Verificar</title>
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

			<h1 align="center">Verificar postulacion</h1>
			<div class="row" align="center">
				<div class="col-sm-6">
					<form id="frmVentasProductos" enctype="multipart/form-data">
						<label>CI.- Nombre</label>
						<select class="js-example-basic-multiple"  name="states[]">
							<option value="A">Seleccione</option>
							<?php
							require_once "../../clases/Conexion.php"; 
							$c= new conectar();
							$conexion=$c->conexion();
							$sql= "SELECT id_estudiante, nombres, apellidos, ci FROM estudiante";
							$result=mysqli_query($conexion,$sql);

							while ($est=mysqli_fetch_row($result)):
								?>
								<option value="<?php echo $est[0]?>"> <?php echo $est[3]." ".$est[1]." ".$est[2] ?> </option>
								<?php 
							endwhile;
							?>
						</select>
						<span id="btnAgregaArticulo" class="btn btn-primary">Ver Datos</span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="tablaVentaTempLoad"></div>
				</div>
			</div>
		</div>
	</body>
	</html>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#clienteVenta').select2();
			$('#productoVenta').select2();
		});
	</script>
<script type="text/javascript">
	$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
	
