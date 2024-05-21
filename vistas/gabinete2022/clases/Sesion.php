<?php 

class sesiones{

		public function agregaSesiones($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT INTO sesiones( fechaSesiones, 
										objetivo, 
										actividad, 
										resultado, 
										apoyo, 
										diagnostico, 
										comportamiento, 
										id_estudiante, 
										id_usuario)
						values ('$datos[0]',
								'$datos[1]',
								'$datos[2]',
								'$datos[3]',
								'$datos[4]',
								'$datos[5]',
								'$datos[6]',
								'$datos[7]',
								'$datos[8]')";

			return mysqli_query($conexion,$sql);
		}
	}
?>