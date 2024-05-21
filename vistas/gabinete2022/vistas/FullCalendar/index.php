<?php
require_once('bdd.php');


$sql = "SELECT id, title, start, end, color, id_estudiante FROM events ";


$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>agenda</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />
	
	<!-- Select2 -->
	<link rel="stylesheet" type="text/css" href="../../librerias/select2/css/select2.css">
<script src="../../librerias/select2/js/select2.js"></script>

	<!-- Custom CSS -->
	<style>
	body {
		padding-top: 70px;
		/* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
	}
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
</style>

</head>

<body>
	<?php require_once "../../vistas/menu.php"; ?>


	<div class="container">

		<div class="row">
			<div class="col-lg-12 text-center">
				<h2 style="color:green;">Reserva de citas</h2>
				<div id="calendar" class="col-centered">
				</div>
			</div>
			
		</div>
		<!-- /.row -->
		
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form class="form-horizontal" method="POST" action="FullCalendar/addEvent.php">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Add Event</h4>
						</div>
						<div class="modal-body">

							<div class="form-group">
								<label for="title" class="col-sm-2 control-label">Title</label>
								<div class="col-sm-10">
									<input type="text" name="title" class="form-control" id="title" placeholder="Title">
								</div>
							</div>
							<div class="form-group">
								<label for="color" class="col-sm-2 control-label">Color</label>
								<div class="col-sm-10">
									<select name="color" class="form-control" id="color">
										<option value="">Choose</option>
										<option style="color:#0071c5;" value="#0071c5">&#9724; Postulacion</option>
										<option style="color:#40E0D0;" value="#40E0D0">&#9724; Visita</option>
										<option style="color:#008000;" value="#008000">&#9724; Entrevista</option>						  
										<option style="color:#FFD700;" value="#FFD700">&#9724; Derivacion</option>

									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="start" class="col-sm-2 control-label">Start date</label>
								<div class="col-sm-10">
									<input type="text" name="start" class="form-control" id="start" >
								</div>
							</div>
							<div class="form-group">
								<label for="end" class="col-sm-2 control-label">End date</label>
								<div class="col-sm-10">
									<input type="text" name="end" class="form-control" id="end" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Curso</label>
								<div class="col-sm-10">
								<select class="form-control input-sm" id="id_estudiante" name="id_estudiante">
									<option value="A">Selecciona Estudiante</option>
									<?php 
									require_once "../../clases/Conexion.php"; 
									$c=new conectar();
									$conexion=$c->conexion();
									$sql="SELECT id_estudiante,nombres,apellidos from estudiante";

									$result= mysqli_query($conexion, $sql);
									while($ver=mysqli_fetch_row($result)): ?>
										<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?> <?php echo $ver[2]; ?></option>
									<?php endwhile; ?>
								</select>
								</div>
							</div>		
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form class="form-horizontal" method="POST" action="FullCalendar/editEventTitle.php">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
						</div>
						<div class="modal-body">

							<div class="form-group">
								<label for="title" class="col-sm-2 control-label">Title</label>
								<div class="col-sm-10">
									<input type="text" name="title" class="form-control" id="title" placeholder="Title">
								</div>
							</div>
							<div class="form-group">
								<label for="color" class="col-sm-2 control-label">Color</label>
								<div class="col-sm-10">
									<select name="color" class="form-control" id="color">
										<option value="">Choose</option>
										<option style="color:#0071c5;" value="#0071c5">&#9724; Postulacion</option>
										<option style="color:#40E0D0;" value="#40E0D0">&#9724; Visita</option>
										<option style="color:#008000;" value="#008000">&#9724; Entrevista</option>						  
										<option style="color:#FFD700;" value="#FFD700">&#9724; Derivacion</option>

									</select>
								</div>
							</div>
							<div class="form-group"> 
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
									</div>
								</div>
							</div>

							<input type="hidden" name="id" class="form-control" id="id">


						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
	<!-- /.container -->
<script src="../../librerias/select2/js/select2.js"></script>
	<!-- jQuery Version 1.11.1 -->

	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>
	
	<script>

		$(document).ready(function() {

			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,basicWeek,basicDay'
				},
				defaultDate: '2016-01-12',
				editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				//$('#ModalAdd #end').val(moment(end).format(' HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 

				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
				?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					est: '<?php echo $event['id_estudiante']; ?>',
					color: '<?php echo $event['color']; ?>',



				},
			<?php endforeach; ?>
			]
		});

			function edit(event){
				start = event.start.format('YYYY-MM-DD HH:mm:ss');
				if(event.end){
					end = event.end.format('YYYY-MM-DD HH:mm:ss');
				}else{
					end = start;
				}

				id =  event.id;

				Event = [];
				Event[0] = id;
				Event[1] = start;
				Event[2] = end;

				$.ajax({
					url: 'editEventDate.php',
					type: "POST",
					data: {Event:Event},
					success: function(rep) {
						if(rep == 'OK'){
							alert('Saved');
						}else{
							alert('Could not be saved. try again.'); 
						}
					}
				});
			}
		});

	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#id_estudiante').select2();
			$('#productoVenta').select2();
		});

	</script>

</body>

</html>