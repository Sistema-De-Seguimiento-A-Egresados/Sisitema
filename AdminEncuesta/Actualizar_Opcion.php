<?php

require_once "Controllers/conexion.php";

$query = "update tb_encuesta_pregunta_opcion
	      set n_orden_opcion = '".$_POST['numopc']."',
	      c_detalle_opcion  = '".$_POST['detopc']."',
	      c_tipo_opcion  = '".$_POST['tipoopc']."',
	      n_valor  = '".$_POST['valopc']."'
 		  where id_opcion = ".$_POST['idopc'];	

try {
	$resultado= mysqli_query($conexion,$query);	
	$resp['error']=false;
} catch (Exception $e) {
	$resp['error']=true;	
}
echo json_encode($resp);
?>
