<?php

require_once "Controllers/conexion.php";

$page= $_GET['page'];

$query = "select * from tb_encuesta
 		  order by id_encuesta	
		  limit ".(10*($page-1)).",".(10*($page));
$data = array();
try {
	$resultado = mysqli_query($conexion,$query);
	while( $row = mysqli_fetch_assoc($resultado)){
	    $data[$row['id_encuesta']] = $row;
	}
	$resp['error']=false;	
} catch (Exception $e) {	
	$resp['error']=true;	
}

$resp['data']=$data;
echo json_encode($resp);

?>
