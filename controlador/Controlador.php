<?php
	include("../Modelo/clases.php"); //Trae el archivo clases.php en cual se creara más adelante
	echo "entré aca";
	if(isset($_POST["registrar"])) 
	{ // Verifica si el botón oprimido es el de registro
		$usu=$_REQUEST['usu']; // Captura de valor de campos de formulario
		$nom=$_REQUEST['nom'];
		$ape=$_REQUEST['ape'];
		$pass=$_REQUEST['pass'];
		$pass = password_hash($pass,PASSWORD_DEFAULT); //Encriptación de la contraseña digitada
		$objeto= new clases; // Creación de un objeto de la clase clases del archivo clases.php
		$res=$objeto->verifica($usu); //Llamada mediante el objeto creado del método “verifica” con el parámetro usuario
		//el resultado del método se asigna a la variable $res
		if($res->num_rows == 1) //Verifica cuantos registro hay en el valor retornado $res (num_rows)
		{
			header("location:../vista/html/registro.php?dato1=no"); //si es = a 1, el usuario ya existe
		}
		else
		{
			$res=$objeto->registro($usu,$nom,$ape,$pass); //Si no es = 1 , llama al método “resgistro” con 4 parámetros
			header("location:../vista/html/registro.php?dato=no"); //Redirige a página registro sin errores
		}
		$objeto->CloseDB(); // Cierra conexión a base de datos
	}
?>