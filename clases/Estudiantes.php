<?php 

class estudiantes{

		public function agregaEstudiante($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="INSERT into estudiante(nombres, 
			apellidos, 
			fechaNacimiento, 
			genero, 
			ci, 
			direccion, 
			conQuienVive, 
			nacionalidad, 
			id_cursos,
			id_usuario)
						values ('$datos[0]',
								'$datos[1]',
								'$datos[2]',
								'$datos[3]',
								'$datos[4]',
								'$datos[5]',
								'$datos[6]',
								'$datos[7]',
								'$datos[8]',
								'$datos[9]'
								)";

			return mysqli_query($conexion,$sql);
		}
		public function actualizaEstudiante($datos){
		$c= new conectar();
		$conexion=$c->conexion();
		$sql="UPDATE estudiante set nombres='$datos[1]',
									apellidos='$datos[2]',
									fechaNacimiento='$datos[3]',
									genero='$datos[4]',
									ci='$datos[5]',
									direccion='$datos[6]',
									conQuienVive='$datos[7]',
									nacionalidad='$datos[8]'
								

		 where id_estudiante='$datos[0]'";
		echo mysqli_query($conexion,$sql);
	}
	public function eliminaEstudiante($idestudiante){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="DELETE from estudiante where id_estudiante='$idestudiante'";
	return mysqli_query($conexion,$sql);
	}

	}
?>