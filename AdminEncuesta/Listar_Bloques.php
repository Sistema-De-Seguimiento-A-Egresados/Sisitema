<?php

require_once "Controllers/conexion.php";

$query = "SELECT * FROM tb_encuesta_bloque
		WHERE id_encuesta = ".$_POST['id']."
		ORDER BY id_bloque";

$data = array();

try {
	$resultado = mysqli_query($conexion,$query);
	while( $row = mysqli_fetch_assoc($resultado)){
	    $data[$row['id_bloque']] = $row;
	}
	$resp['error']=false;
} catch (Exception $e) {
	$resp['error']=true;	
}

$resp['data']=$data;


$query = "select * from tb_encuesta
 		  where id_encuesta = ".$_POST['id'];	

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
$resp['encuesta']=$data;

echo json_encode($resp);

?>
