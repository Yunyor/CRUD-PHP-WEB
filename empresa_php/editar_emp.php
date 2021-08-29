
<!doctype html>
<html lang="en">
  <head>
	<title>Pagina PHP</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS v5.0.2 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
  <?php
	include("datos_conexion.php");
    $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
    $id_empleado = utf8_decode($_GET["id"]);
    $db_conexion ->real_query("SELECT e.id_empleado as id, e.codigo, e.nombres, e.apellidos, e.direccion, e.telefono, e.fecha_nacimiento, p.puesto FROM db_empresa_2021.empleados AS e INNER JOIN db_empresa_2021.puestos AS p ON e.id_puesto = p.id_puesto WHERE id_empleado = $id_empleado;");
    $resultado = $db_conexion->use_result();
    $fila_de_empleado = $resultado->fetch_assoc();

 
    $db_conexion_puesto = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
	$db_conexion_puesto ->real_query("SELECT id_puesto as id, puesto as puesto FROM puestos;");
	$resultado_puesto = $db_conexion_puesto->use_result();
    $id_Puestos = $resultado_puesto->fetch_assoc();
?>
	  	<br>
	  	<h1 class="text-center"> Editar Empleado </h1>

	  <div class="container">
		  <form class="d-flex" action="" method="POST" autocomplete="off">
			  <div class="col">
				
                <input type="hidden" name="id" id="id" value="<?php echo $fila_de_empleado['id']; ?>">
			  	<div class="mb-3">
					<label for="lbl_codigo" class="form-label"><b>Codigo</b></label>
					<input type="text" name="txt_codigo" id="txt_codigo" class="form-control" value="<?php echo $fila_de_empleado['codigo']; ?>">
				</div>

				<div class="mb-3">
					<label for="lbl_nombres" class="form-label"><b>Nombres</b></label>
					<input type="text" name="txt_nombres" id="txt_nombres" class="form-control" value="<?php echo $fila_de_empleado['nombres']; ?>">
				</div>

				<div class="mb-3">
					<label for="lbl_apellidos" class="form-label"><b>Apellidos</b></label>
					<input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" value="<?php echo $fila_de_empleado['apellidos']; ?>">
				</div>

				<div class="mb-3">
					<label for="lbl_direccion" class="form-label"><b>Direccion</b></label>
					<input type="text" name="txt_direccion" id="txt_direccion" class="form-control" value="<?php echo $fila_de_empleado['direccion']; ?>">
				</div>

				<div class="mb-3">
					<label for="lbl_telefono" class="form-label"><b>Telefono</b></label>
					<input type="number" name="txt_telefono" id="txt_telefono" class="form-control" value="<?php echo $fila_de_empleado['telefono']; ?>">
				</div>
                
				<div class="mb-3">
				  <label for="lbl_puesto" class="form-label"><b>Puesto</b></label>
				  <select class="form-select" name="drop_puesto" id="drop_puesto" required>
					<option value="<?php echo $id_Puestos['id']; ?>"><?php echo $id_Puestos['puesto']; ?></option>
					
					<?php
						while($fila = $resultado_puesto->fetch_assoc()){
							echo"<option value=". $fila['id'] .">". $fila['puesto'] ."</option>";
						}
						$db_conexion_puesto->close();
					?>

				  </select>
				</div>

				<div class="mb-3">
					<label for="lbl_fecha_nacimiento" class="form-label"><b>Fecha de Nacimiento</b></label>
					<input type="date" name="txt_fecha_nacimiento" id="txt_fecha_nacimiento" class="form-control" value="<?php echo $fila_de_empleado['fecha_nacimiento']; ?>">
				</div>
				
				<div class="mb-3">
                   
                    <input type="submit" name="btn_editar" id="btn_editar" class="btn btn-warning" value="Editar">
				</div>
			  </div>
			  
		  </form>
          
	  </div>

      <?php
		
		if(isset($_POST["btn_editar"])){	
			include 'actualizar_datos.php';
		}

	?>

	

	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>

