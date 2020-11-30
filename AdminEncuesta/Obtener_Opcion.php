<?php

require_once "Controllers/conexion.php";

$query = "select * from tb_encuesta_pregunta_opcion
 		  where id_opcion = ".$_POST['id'];	

$data = array();

try {
	$resultado = mysqli_query($conexion,$query);
	while( $row = mysqli_fetch_assoc($resultado)){
	    $data = $row;
	}
	$resp['error']=false;
} catch (Exception $e) {
	$resp['error']=true;	
}
$resp['data']=$data;
echo json_encode($resp);
?>
