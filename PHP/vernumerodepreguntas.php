
<?php
session_start();
$conexion = mysqli_connect('localhost', 'root', '') or die ("Error en la conexión".mysqli_error());
if ($conexion)
{
        mysqli_select_db($conexion, 'cuestionarios') or die ("Error al seleccionar la base de datos");
	$query = "SELECT COUNT(*) FROM preguntas WHERE Id_cuestionario=".$_SESSION['idguardada'];
        $resultado = $conexion->query($query);
	$json = array();
	if($resultado){ 
	   while ($row = $resultado->fetch_row()) {
    	     array_push($json, array("nodepreguntas"=>$row[0]));
	   }
     echo json_encode($json);
	}
}
?>