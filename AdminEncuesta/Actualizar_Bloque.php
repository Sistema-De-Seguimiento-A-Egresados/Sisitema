<?php
//Archivo para actualizar los bloques de preguntas. A la función mysqli_query se le pasan 2 parámetros:
//la conexion a la BD (que viene del archivo conexion.php en la línea 4, require_once hace que las variables que se crean en ese archivo sirvan en este) y la query. En este caso es un update, se le pasa el nombre de la tabla y las variables que se desean cambiar.
//$_POST envía los valores de las variables con ese name en el HTML
require_once "Controllers/conexion.php";

$query = "update tb_encuesta_bloque
	      set c_nombre_bloque = '".$_POST['nomblo']."',
	      n_orden_bloque  = '".$_POST['numblo']."'
 		  where id_bloque = ".$_POST['idblo'];	
try {
	$resultado= mysqli_query($conexion,$query);	
	$resp['error']=false;
} catch (Exception $e) {
	$resp['error']=true;	
}
//en PHP echo se usa para imprimir algo. json_encode imprime una respuesta json
echo json_encode($resp);
?>
