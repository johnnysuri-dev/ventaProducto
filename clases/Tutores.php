	<?php 

class tutores{

		public function agregaTutor($datos){
			$c= new conectar();
			$conexion=$c->conexion();

//		SELECT `id_tutor`, `apellido_paterno`, `apellido_materno`, `nombres`, `ci`, `complemento`, `fecha_nacimiento`, `email`, `telefono` FROM `tutor` WHERE 1

			$sql="INSERT into tutor(apellido_paterno,
								apellido_materno,
								nombres,
								ci,
								complemento,
								fecha_nacimiento,
								email,
								telefono)
						values ('$datos[0]',
								'$datos[1]',
								'$datos[2]',
								'$datos[3]',
								'$datos[4]',
								'$datos[5]',
								'$datos[6]',
								'$datos[7]')";

			return mysqli_query($conexion,$sql);
		}
		public function actualizaEstudiante($datos){
		$c= new conectar();
		$conexion=$c->conexion();


		$sql="UPDATE estudiante set apellido_paterno='$datos[1]',
									apellido_materno='$datos[2]',
									nombres='$datos[3]',
									pais='$datos[4]',
									departamento='$datos[5]',
									provincia='$datos[6]',
									localidad='$datos[7]'

		 where id_tutor='$datos[0]'";
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