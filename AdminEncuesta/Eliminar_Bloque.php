<?php

require_once "Controllers/conexion.php";


$query = "delete from tb_encuesta_bloque 
 		  where id_bloque = ".$_POST['id'];	
try {
	$resultado = mysqli_query($conexion,$query);
	$resp['error']=false;	
} catch (Exception $e) {	
	$resp['error']=true;	
}

$query = "delete from tb_encuesta_pregunta 
 		  where id_bloque = ".$_POST['id'];	
try {
	$resultado = mysqli_query($conexion,$query);
	$resp['error']=false;	
} catch (Exception $e) {	
	$resp['error']=true;	
}

echo json_encode($resp);

?>
