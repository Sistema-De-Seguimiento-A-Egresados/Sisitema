<?php

require_once "Controllers/conexion.php";

$query = "SELECT * FROM tb_encuesta_pregunta_opcion
		WHERE id_pregunta = ".$_POST['id']."
		ORDER BY id_opcion";

$data = array();

try {
	$resultado = mysqli_query($conexion,$query);
	while( $row = mysqli_fetch_assoc($resultado)){
	    $data[$row['id_opcion']] = $row;
	}
	$resp['error']=false;
} catch (Exception $e) {
	$resp['error']=true;	
}

$resp['data']=$data;



$query = "SELECT * FROM tb_encuesta_pregunta
		WHERE id_pregunta = ".$_POST['id']."
		ORDER BY id_pregunta";

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

$resp['pregunta']=$data;


echo json_encode($resp);

?>
