<?php 

class cursos{

		public function agregaCurso($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="INSERT into cursos(nombre)
						values ('$datos[0]')";

			return mysqli_query($conexion,$sql);
		}
	}
?>