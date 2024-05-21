
<?php 
require_once "../../clases/Conexion.php";
$c= new conectar();
$conexion=$c->conexion();
$sql="SELECT es.id_estudiante, es.nombres, es.apellidos, es.fechaNacimiento, es.genero, es.ci, es.direccion, es.conQuienVive, es.nacionalidad, c.nombre FROM estudiante AS es INNER JOIN cursos AS c ON es.id_cursos=c.id_cursos";

$result=mysqli_query($conexion,$sql);
?>

<table class="table table-hover table-condensed table-bordered" id="iddatatable">
	<thead style="background-color: #0A81B1;color: white; font-weight: bold;">
		<tr>
			<td>ID</td>	
			<td>Nombres</td>
			<td>Apellidos</td>
			<td>Fecha Nacimiento</td>
			<td>Genero</td>
			<td>ci</td>
			<td>Direcion</td>
			<td>Vive</td>
			<td>Nacionalidad</td>
			<td>Curso</td>
			<td>Tutor</td>
			<td>Editar</td>
			<td>Eliminar</td>
		</tr>
	</thead>
	<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
		<tr>
			<td>ID</td>	
			<td>Nombres</td>
			<td>Apellidos</td>
			<td>Fecha Nacimiento</td>
			<td>Genero</td>
			<td>ci</td>
			<td>Direcion</td>
			<td>Vive</td>
			<td>Nacionalidad</td>
			<td>Curso</td>
			<td>Tutor</td>
			<td>Editar</td>
			<td>Eliminar</td>
		</tr>
	</tfoot>
	<tbody >
	<?php 
	while ($ver =mysqli_fetch_row($result)):
		?>	
		<tr>

			<td><?php echo $ver[0]; ?></td>
			<td><?php echo $ver[1]; ?></td>
			<td><?php echo $ver[2]; ?></td>
			<td><?php echo $ver[3]; ?></td>
			<td><?php echo $ver[4]; ?></td>		
			<td><?php echo $ver[5]; ?></td>
			<td><?php echo $ver[6]; ?></td>
			<td><?php echo $ver[7]; ?></td>
			<td><?php echo $ver[8]; ?></td>
			<td><?php echo $ver[9]; ?></td>
			<td>
				<span class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#añadirDatosFamilia" onclick="cargarDatos('<?php echo $ver[0] ?>','<?php echo $ver[1] ?>','<?php echo $ver[2] ?>')">
					<span class="glyphicon glyphicon-user"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaEstudiante" onclick="agregaDato('<?php echo $ver[0] ?>','<?php echo $ver[1] ?>','<?php echo $ver[2] ?>','<?php echo $ver[3] ?>','<?php echo $ver[4] ?>','<?php echo $ver[5] ?>','<?php echo $ver[6] ?>','<?php echo $ver[7] ?>','<?php echo $ver[8] ?>','<?php echo $ver[9] ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="eliminaEstudiante('<?php echo $ver[0] ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
		</tr>
	<?php endwhile; ?>
</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable();
	} );
</script>

