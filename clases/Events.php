<?php 

class events{

		public function actualizaEstado($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$est="Atendido";

		$sql="UPDATE events set estado='$est'
		where id_estudiante='$datos[10]'";
		
		echo mysqli_query($conexion,$sql);
		//echo $datos[9];
		}
		
	}
?>


	