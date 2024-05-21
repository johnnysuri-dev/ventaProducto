<?php 

/**
 * 
 */
class conectar{
	
	private $servidor="localhost";
	private $usuario="id15880133_gpsistemagabinnete";
	private $password="G^80szF[R/Me&uYd";
	private $bd="id15880133_gpsuri";
public function conexion()
	{
	$conexion=mysqli_connect($this->servidor,
							$this->usuario,
							$this->password,
							$this->bd);
	return $conexion;

	}

}

 ?>
