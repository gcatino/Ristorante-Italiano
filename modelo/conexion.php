<?php
	class conexion //clase principal
	{
		public function __construct() //Método Constructor de la clase
		{
			include 'base_datos.php';
			$this->con = new mysqli($dbhost, $dbuser, $dbpass, $dbname); // servidor , usuario db, base de datos
			if($this->con->connect_errno)
			{
				die("Fallo al conectar a la BD: (". $this->con->connect_errno.")"); //Muestra error si
			}
		}
		public function CloseDB() // Método que Cierra conexión a DB
		{
			$this->con->close();
		}
	}
?>