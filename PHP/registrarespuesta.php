<?php
	require_once ('conexion.php');
	session_start();
	$respuesta1=$_POST['respuesta1'];
    $respuesta2=$_POST['respuesta2'];
    $respuesta3=$_POST['respuesta3'];
    $respuesta4=$_POST['respuesta4'];
    $respuestacorrecta=$_POST['respuestacorrecta'];
    $idpregunta=$_SESSION['idpregunta'];
    $idcuestionario=$_SESSION['idcuestionario'];
	if (!$dblink) {
    		echo "4";
		}
		else{
            if($respuestacorrecta==1)
            {
                $sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");	
			if($sqlquery->execute(array($respuesta1,1,$idpregunta,$idcuestionario)))
			{
                $sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");	
			if($sqlquery->execute(array($respuesta2,0,$idpregunta,$idcuestionario)))
            {
                if($respuesta3!==""){
                    $sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");	
			if($sqlquery->execute(array($respuesta3,0,$idpregunta,$idcuestionario)))
            {
                if($respuesta4!==""){
                    $sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");	
			if($sqlquery->execute(array($respuesta4,0,$idpregunta,$idcuestionario)))
            {
                echo "1";
            }
                }
                echo "1";
            }
                }
            }
					
			}
			else{
				print_r($sqlquery->errorInfo());
			}
		
			$dblink==null;
            }
            if($respuestacorrecta==2)
            {
                $sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");	
			if($sqlquery->execute(array($respuesta2,1,$idpregunta,$idcuestionario)))
			{
				$sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");
                if($sqlquery->execute(array($respuesta1,0,$idpregunta,$idcuestionario)))
                {
                    if($respuesta3!==""){
                        $sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");	
			if($sqlquery->execute(array($respuesta3,0,$idpregunta,$idcuestionario)))
            {
                echo "1";
            }
            {
                if($respuesta4!=="")
                {
                    $sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");	
			if($sqlquery->execute(array($respuesta4,0,$idpregunta,$idcuestionario)))
            {
                echo "1";
            }
                }
            }
                    }
                }	
			}
			else{
				print_r($sqlquery->errorInfo());
			}
		
			$dblink==null;
            }
            if($respuestacorrecta==3)
            {
                $sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");	
			if($sqlquery->execute(array($respuesta3,1,$idpregunta,$idcuestionario)))
			{
                $sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");
                if($sqlquery->execute(array($respuesta2,0,$idpregunta,$idcuestionario)))
                {
                    $sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");
                    if($sqlquery->execute(array($respuesta1,0,$idpregunta,$idcuestionario)))
                    {
                        echo "1";
                    }
                }			
			}
			else{
				print_r($sqlquery->errorInfo());
			}
		
			$dblink==null;
            }
            if($respuestacorrecta==4)
            {
                $sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");	
			if($sqlquery->execute(array($respuesta4,1,$idpregunta,$idcuestionario)))
			{
                $sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");
                if($sqlquery->execute(array($respuesta3,0,$idpregunta,$idcuestionario))){
                    $sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");
                    if($sqlquery->execute(array($respuesta2,0,$idpregunta,$idcuestionario))){
                        $sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`,`Id_cuestionario`) VALUES (null,?,?,?,?);");
                        if($sqlquery->execute(array($respuesta1,0,$idpregunta,$idcuestionario)))
                        {
                            echo "1";
                        }
                    }
                }
			}
			else{
				print_r($sqlquery->errorInfo());
			}
		
			$dblink==null;
            }
			/*$sqlquery=$dblink->prepare("INSERT INTO respuestas (`Id_respuesta`, `respuesta`, `EsCorrecta`,`Id_pregunta`) VALUES (null,?,?,?);");	
			if($sqlquery->execute(array($respuesta,$esCorresta,$idpregunta)))
			{
				echo "1";	
			}
			else{
				print_r($sqlquery->errorInfo());
			}
		
			$dblink==null;*/
		}
