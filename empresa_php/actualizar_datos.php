<?php

	include("datos_conexion.php");
	$db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
	
	$id_empleado = utf8_decode($_POST["id"]);
	$txt_codigo = utf8_decode($_POST['txt_codigo']);
	$txt_nombres = utf8_decode($_POST["txt_nombres"]);
	$txt_apellidos = utf8_decode($_POST["txt_apellidos"]);
	$txt_direccion = utf8_decode($_POST["txt_direccion"]);
	$txt_telefono = utf8_decode($_POST["txt_telefono"]);
	$drop_puesto = utf8_decode($_POST["drop_puesto"]);
	$txt_fecha_nacimiento = utf8_decode($_POST["txt_fecha_nacimiento"]);
	
	$sqlUpdate = "UPDATE empleados SET codigo='".$txt_codigo."', nombres='".$txt_nombres."', apellidos='".$txt_apellidos."', direccion='".$txt_direccion."', 
	telefono='".$txt_telefono."', fecha_nacimiento='".$txt_fecha_nacimiento."', id_puesto=$drop_puesto WHERE id_empleado = $id_empleado;";
	
	echo"<br><br><br><br>";
	if($db_conexion->query($sqlUpdate)==true){
		echo 'Se ha modificado los datos correctamente!!!!';
	}
	else{
		echo 'No se ha modificado los datos correctamente!!!!';
	}
	echo"<br>SQL-->:  ".$sqlUpdate."<br>";
	$db_conexion -> close();
	header("Location: index.php");
    
	
?>