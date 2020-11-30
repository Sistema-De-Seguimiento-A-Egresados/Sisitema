<?php

$direccion= "localhost";

$usuario= "root";

$contraseña="";

$nombre_database="encuesta";

$conexion=mysqli_connect($direccion,$usuario,$contraseña,$nombre_database);

	if(mysqli_connect_errno($conexion)){
		echo "La conexion ha fallado";
	}
?>