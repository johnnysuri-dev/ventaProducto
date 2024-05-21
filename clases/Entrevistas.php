<?php 

class entrevistas{

		public function agregaEntrevistas($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			
			$sql="INSERT INTO entrevista2(Datos_Clinicos, 
								desarrollo_Cognitivo, 
								motricidad_Gruesa,
								motricidad_Fina, 
								desarrollo_Sensorial, 
								comunicacion_Linguistico, 
								desarrollo_Social_Afectivo, 
								observaciones, 
								tiene,
								compromiso, 
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
								'$datos[8]',
								'$datos[9]',
								'$datos[10]',
								'$datos[11]')";					

			return mysqli_query($conexion,$sql);
		
		}

	}
?>