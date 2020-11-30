<?php

require_once "Controllers/conexion.php";

$idenc= $_POST['idenc'];
$nomblo= $_POST['nomblo'];
$numblo= $_POST['numblo'];

$query = "insert into tb_encuesta_bloque values (NULL,'".$idenc."','".$numblo."','".$nomblo."',NULL)";

try {
	$resultado= mysqli_query($conexion,$query);	
	$resp['error']=false;
} catch (Exception $e) {
	$resp['error']=true;
}

echo json_encode($resp);

?>
