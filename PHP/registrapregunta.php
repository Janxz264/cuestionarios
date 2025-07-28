<?php
	require_once ('conexion.php');
	session_start();
	$pregunta=$_POST['pregunta'];
	$idcuestionario=$_SESSION['idcuestionario'];
	if (!$dblink) {
    		echo "4";
		}
		else{
			$sqlquery=$dblink->prepare("INSERT INTO preguntas (`Id_pregunta`, `pregunta`, `Id_cuestionario`) VALUES (null,?,?);");	
			if($sqlquery->execute(array($pregunta,$idcuestionario)))
			{
                $last_id = $dblink->lastInsertId();
				$_SESSION["idpregunta"]=$last_id;
				echo "1";	
			}
			else{
				print_r($sqlquery->errorInfo());
			}
		
			$dblink==null;
		}
