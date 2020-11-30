<?php

require_once "conexion.php";

//Envia la cuenta y password como query a la bd para ver si existen
$cuenta= $_POST["cuenta_usuario"];
$password= $_POST["contraseña_usuario"];

$query = "select * from user where correo='$cuenta' and contrasena='$password'";

$resultado = mysqli_query($conexion, $query);

if(mysqli_num_rows($resultado)!=0){
	session_start(); 
	$autentificado = "SI"; 
	while( $row = mysqli_fetch_assoc($resultado)){
	    $data = $row;
	}
	$_SESSION['user'] = $data['id'];
	$_SESSION['estado'] = "conectado";
	header("location: ../Inicio.php");
}else {
	header("location: ../index.php?error=si");
}

mysqli_free_result($resultado); 
mysqli_close($conexion); 

?>


