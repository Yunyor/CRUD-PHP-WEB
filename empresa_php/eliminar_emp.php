<?php

	include("datos_conexion.php");
	$db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
	
	$id_empleado = utf8_decode($_GET["id"]);

	$sql_eliminar = "DELETE FROM empleados WHERE id_empleado = '$id_empleado';";
	
	if($db_conexion->query($sql_eliminar)==true){
		echo 'se ha eliminado el registro con exito';
		} else {
		echo 'hubo un error en eliminar el registro';
	}
	$db_conexion -> close();
	header("Location: index.php");
	die();
	
?>