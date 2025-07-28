<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once ('conexion.php');
	session_start();
		if (!$dblink) {
    		echo "4";
    		//La conexión a la base de datos no se estableció
		}
		else{
			$sqlquery=$dblink->prepare("DELETE FROM cuestionarios where Id_cuestionario=?");
            $sqlquery1=$dblink->prepare("DELETE FROM preguntas where Id_cuestionario=?");
            $sqlquery2=$dblink->prepare("DELETE FROM respuestas where Id_cuestionario=?");
			if($sqlquery2->execute(array($_SESSION['idguardada'])))
			{
                if($sqlquery1->execute(array($_SESSION['idguardada'])))
                {
                    if($sqlquery->execute(array($_SESSION['idguardada'])))
                    {
                        echo "1";
                        //Eliminación exitosa del cuestionario
                    }
                    echo "1";
                    //Eliminación exitosa de las preguntas del cuestionario
                }
				echo "1";
				//Eliminación exitosa de las respuestas del cuestionario
			}
			else{
				echo "2";
				//No se eliminó nada
			} 
		}
	$db=null;
	$sqlquery=null;

