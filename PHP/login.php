<?php
require_once ('conexion.php');
	$name=$_POST['usu'];
	$password=$_POST['pass'];
		if (!$dblink) {
			//Problemas en la conexión a la base de datos
    		echo "4";
		}
		else{
			$sqlquery=$dblink->prepare("SELECT * from usuarios where usuario=?");
			$sqlquery->execute(array($name));
				if(strlen ($sqlquery->fetchColumn()) >0){
				$getpass=$dblink->prepare("SELECT contrasenia from usuarios where usuario=?");
				$getpass->execute(array($name));
				$result=$getpass->fetch();
				if (password_verify($password, $result['contrasenia'])) {
					$getdata=$dblink->prepare("SELECT * from usuarios where usuario=?");
					$getdata->execute(array($name));
					$res=$getdata->fetch();
					session_start();
					$_SESSION['nombreSesion']=$res[0];	
					$_SESSION['usuarioSesion']=$res[1];
					$_SESSION['esAdministador']=$res[3];
					echo "1";
					//Éxito en la conexión
				}
						 else {
    				echo "2"; //Usuario o contraseña incorrectos
				}
			}
			else{
				echo "3";
				//El usuario no existe
			}
		}
	$dblink=null;
	$sqlquery=null;
	$getpass=null;
	$getdata=null;
	$getinfo=null;
	$res=null;
	$result=null;

