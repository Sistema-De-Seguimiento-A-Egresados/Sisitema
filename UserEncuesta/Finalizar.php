<?php
require_once "Controllers/conexion.php";
session_start();

try {
	$resultado = mysqli_query($conexion,"select * from tb_encuesta_respuesta where id_user = '".$_SESSION['user']."' and id_encuesta = '".$_POST['id_encuesta']."'");

	while( $row = mysqli_fetch_assoc($resultado)){
    	$data = $row;
	} 

	if ($data['c_estado']=='F') {
		header("Location: Inicio.php");
	}



	foreach($_POST['pregunta'] as $id_pregunta=>$valor){
		$query="insert into tb_encuesta_respuesta_opcion values (NULL,".$_POST['id_encuesta'].",".$id_pregunta.",".$valor.",CURRENT_TIMESTAMP())";
		$resultado = mysqli_query($conexion,$query);
	}

	$query="update tb_encuesta_respuesta set d_fin_encuesta = CURRENT_TIMESTAMP() , c_estado='F' where id_user=".$_SESSION['user']." and id_encuesta = ".$_POST['id_encuesta'];
	$resultado = mysqli_query($conexion,$query);	

	$resp['error']=false;
} catch (Exception $e) {
	$resp['error']=true;
}

header("Location: Inicio.php");
?>