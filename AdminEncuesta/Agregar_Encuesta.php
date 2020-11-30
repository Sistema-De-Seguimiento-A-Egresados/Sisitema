<?php

require_once "Controllers/conexion.php";

$nombre= $_POST['nomenc'];

$query = "insert into tb_encuesta values (NULL,'".$nombre."',NULL)";

try {
	$resultado= mysqli_query($conexion,$query);	
	$resp['error']=false;
} catch (Exception $e) {
	$resp['error']=true;
}

echo json_encode($resp);

?>
