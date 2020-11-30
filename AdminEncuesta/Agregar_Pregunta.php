<?php

require_once "Controllers/conexion.php";

$idblo= $_POST['idblo'];
$idenc= $_POST['idenc'];
$nompreg= $_POST['nompreg'];
$detpreg= '';
$numpreg= $_POST['numpreg'];
$tipopreg= $_POST['tipopreg'];

$query = "insert into tb_encuesta_pregunta values (NULL,'$idenc',$idblo,'$tipopreg',$numpreg,'$nompreg','$detpreg',NULL)";

try {
	$resultado= mysqli_query($conexion,$query);	
	$resp['error']=false;
} catch (Exception $e) {
	$resp['error']=true;
}

echo json_encode($resp);

?>
