<?php

require_once "Controllers/conexion.php";

$query = "update tb_encuesta
	      set c_nombre_encuesta = '".$_POST['nomenc']."'
 		  where id_encuesta = ".$_POST['idenc'];	
try {
	$resultado= mysqli_query($conexion,$query);	
	$resp['error']=false;
} catch (Exception $e) {
	$resp['error']=true;	
}
echo json_encode($resp);
?>
