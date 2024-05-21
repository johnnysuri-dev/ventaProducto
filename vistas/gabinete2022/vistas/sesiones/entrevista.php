<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Entrevista</title>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
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
		</div>

	</div>
</div>

</body>
</html>