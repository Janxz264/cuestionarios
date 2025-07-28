
<?php
session_start();
$conexion = mysqli_connect('localhost', 'root', '') or die ("Error en la conexión".mysqli_error());
if ($conexion)
{
        mysqli_select_db($conexion, 'cuestionarios') or die ("Error al seleccionar la base de datos");
	$query = "SELECT * from cuestionarios;";
        $resultado = $conexion->query($query);
	$json = array();
	if($resultado){ 
	   while ($row = $resultado->fetch_row()) {
    	     array_push($json, array("idcuestionario"=>$row[0], "nombre"=>$row[1], "fecha_creacion"=>$row[2]));
	   }
     echo json_encode($json);
	}
}
?>