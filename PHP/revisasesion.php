<?php
session_start();
if(isset($_SESSION['nombreSesion'])){
	echo "1";
}
else{
	echo "2";
}
?>