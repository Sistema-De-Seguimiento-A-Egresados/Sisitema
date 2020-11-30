<?php

require_once "conexion.php";

//Envia la cuenta y password como query a la bd para ver si existen

try{
	$query = "insert into user values(NULL,'".$_POST['cuenta_usuario']."','".$_POST['contraseña_usuario']."','".$_POST['nombre_usuario']."','".$_POST['apellido_usuario']."','".$_POST['codigo_usuario']."')";
	$resultado = mysqli_query($conexion,$query);
	header("location: ../index.php");
}catch(Exception $e) {
	header("location: ../index.php?error=si");
}

mysqli_free_result($resultado); 
mysqli_close($conexion); 

?>


