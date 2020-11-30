<?php

require_once "Controllers/conexion.php";

$idenc= $_POST['idenc'];
$idpreg= $_POST['idpreg'];
$detopc= $_POST['detopc'];
$numopc= $_POST['numopc'];
$tipoopc= $_POST['tipoopc'];
$valopc= $_POST['valopc'];

$query = "insert into tb_encuesta_pregunta_opcion values (NULL,'$idpreg',$idenc,'$numopc','$detopc','$tipoopc','$valopc',NULL)";

try {
	$resultado= mysqli_query($conexion,$query);	
	$resp['error']=false;
} catch (Exception $e) {
	$resp['error']=true;
}

echo json_encode($resp);

?>
