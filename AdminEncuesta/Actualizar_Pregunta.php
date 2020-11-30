<?php

require_once "Controllers/conexion.php";

$query = "update tb_encuesta_pregunta
	      set c_detalle_pregunta = '',
	      c_titulo_pregunta  = '".$_POST['nompreg']."',
	      n_orden_pregunta  = '".$_POST['numpreg']."',
	      c_tipo_pregunta  = '".$_POST['tipopreg']."'
 		  where id_pregunta = ".$_POST['idpreg'];	

try {
	$resultado= mysqli_query($conexion,$query);	
	$resp['error']=false;
} catch (Exception $e) {
	$resp['error']=true;	
}
echo json_encode($resp);
?>
