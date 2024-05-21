
<?php 


require_once "../../clases/Conexion.php";

$c= new conectar();
$conexion=$c->conexion();
$fecha=date("Y-m-d"); // captura la fecha de hoy
$sql="SELECT c.id, c.title, c.start, c.end, cu.nombre, e.nombres, e.apellidos, e.ci, e.id_estudiante, c.estado FROM events AS c INNER JOIN estudiante AS e ON e.id_estudiante=c.id_estudiante INNER JOIN cursos AS cu ON cu.id_cursos=e.id_cursos WHERE c.estado='Atendido'";
$result=mysqli_query($conexion,$sql);
?>

<table class="table table-hover table-condensed table-bordered" id="iddatatable">
	<thead style="background-color: #008000;color: white; font-weight: bold;">
		<tr>
			<td>ID</td>	
			<td>Cita</td>
			<td>Fecha hora inicio</td>
			<td>Fecha hora final</td>
			<td>curso</td>
			<td>Estudiante</td>
			<td>Estudiante Ap.</td>
			<td>ci</td>
			<td>idEst</td>
			<td>Atender</td>
			<td>Entrevista</td>
		</tr>
	</thead>
	<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
		<tr>
			<td>ID</td>	
			<td>Cita</td>
			<td>Fecha hora inicio</td>
			<td>Fecha hora final</td>
			<td>curso</td>
			<td>Estudiante</td>
			<td>Estudiante Ap.</td>
			<td>ci</td>
			<td>idEst</td>
			<td>Atender</td>
			<td>Entrevista</td>
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
			<td>
			<a href="../vistas/reportes/HojaCompromiso.php?ide=<?php echo $ver[8] ?>" class="btn btn-danger btn-sm">Compromiso<span class="glyphicon glyphicon-file"></span>
				</a>
			</td>
			<td>
			<a href="../vistas/reportes/informePsicopedagogico.php?ide=<?php echo $ver[8] ?>" class="btn btn-danger btn-sm">Informe <span class="glyphicon glyphicon-file"></span>
				</a>
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

