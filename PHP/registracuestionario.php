<?php
	require_once ('conexion.php');
	session_start();
	$nombre=$_POST['nombre'];
	if (!$dblink) {
    		echo "4";
		}
		else{
			$sqlquery=$dblink->prepare("INSERT INTO cuestionarios VALUES (null,?,now())");	
			if($sqlquery->execute(array($nombre)))
			{
				$last_id = $dblink->lastInsertId();
				$_SESSION["idcuestionario"]=$last_id;
				echo "1";	
			}
			else{
				print_r($sqlquery->errorInfo());
			}
			$dblink==null;
		}
