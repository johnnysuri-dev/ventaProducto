<?php 
	require_once "../../clases/Conexion.php";
	$c= new conectar();
	$conexion=$c->conexion();
	$sql="SELECT `id_cursos`, `nombre` FROM `cursos`";
	$result=mysqli_query($conexion,$sql);
 ?>

<table class="table table-hover table-condensed table-bordered" id="iddatatable">
	<thead style="background-color: #0A81B1;color: white; font-weight: bold;">
		<td>Nombre del curso</td>	
			<td>Editar</td>
			<td>Eliminar</td>
	</thead>
	<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
		<tr>
			<td>Nombre del curso</td>	
			<td>Editar</td>
			<td>Eliminar</td>
			
		</tr>
	</tfoot>
<?php 
while ($ver =mysqli_fetch_row($result)):
 ?>	
	<tbody>
		<td><?php echo $ver[1]; ?></td>
		<td>
		<span class="btn btn-warning btn-xs" data-toggle="modal">
			<span class="glyphicon glyphicon-pencil"></span>
		</span>
		</td>
		<td>
		<span class="btn btn-danger btn-xs">
			<span class="glyphicon glyphicon-remove"></span>
		</span>
		</td>
	</tbody>
<?php endwhile; ?>
</table>
<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable();
	} );
</script>

