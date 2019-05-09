<?php
	include("conexion.php"); // incluye el archivo conexion.php el cual se conecta a la base de datos
	$df=new conexion; // Crea un objeto a partir de la clase conexión para inicializar constructor
	class clases extends conexion 
	{ // Crea una clase que hereda de la clase conexión
		public function verifica($dato) //Método que verifica si el usuario existe
		{
			$q = "select * from usuario where usuario='$dato'";
			$consulta = $this->con->query($q) or die ('Error!' . mysql_error());
			return $consulta;
		}
		public function registro($usu,$nom,$ape,$cont) // Método que recibe 4 parámetros
		{
			$q = "insert into usuario(usuario,nombre,apellido,contrasena,idrol) values('$usu','$nom','$ape','$cont',1)";
			$consulta = $this->con->query($q) or die ('failed!' . mysql_error());
			return $consulta;
		}
		// Se realiza inserción a la base de datos y retorna el resultado en la variable $consulta
	}
?>