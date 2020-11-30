<?php

require_once "conexion.php";

$cuenta= $_POST["cuenta_usuario"];
$password= $_POST["contraseña_usuario"];

$query = "select * from admin where correo='$cuenta' and contrasena='$password'";

$resultado = mysqli_query($conexion, $query);

if(mysqli_num_rows($resultado)!=0){
	session_start(); 
	$autentificado = "SI"; 
	header("location: ../Gestion.php");
	$_SESSION['admin'] = "admin";
	$_SESSION['estado'] = "conectado";
}else {
	header("location: ../index.php?error=si");
}

mysqli_free_result($resultado); 
mysqli_close($conexion); 

?>


