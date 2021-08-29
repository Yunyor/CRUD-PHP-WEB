

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
	include 'datos_conexion.php';
	
	
	$db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
	$db_conexion ->real_query("SELECT e.id_empleado as id, e.codigo, e.nombres, e.apellidos, e.direccion, e.telefono, e.fecha_nacimiento, p.puesto FROM db_empresa_2021.empleados AS e INNER JOIN db_empresa_2021.puestos AS p ON e.id_puesto = p.id_puesto ORDER BY codigo;");
	$resultado = $db_conexion->use_result();

	
	$db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
	$db_conexion ->real_query("SELECT id_puesto as id, puesto as puesto FROM puestos;");
	$resultado= $db_conexion->use_result();
?>
	  	<br>
	  	<h1 class="text-center"> Formulario Empleados </h1>

	  <div class="container">
		  <form class="d-flex" action="agregar_emp.php" method="POST">
			  <div class="col">
				  
			  	<div class="mb-3">
					<label for="lbl_codigo" class="form-label"><b>Codigo</b></label>
					<input type="text" name="txt_codigo" id="txt_codigo" class="form-control" placeholder="E001" required>
				</div>

				<div class="mb-3">
					<label for="lbl_nombres" class="form-label"><b>Nombres</b></label>
					<input type="text" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="Nombre1 Nombre2" required>
				</div>

				<div class="mb-3">
					<label for="lbl_apellidos" class="form-label"><b>Apellidos</b></label>
					<input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" placeholder="Apellido1 Apellido2" required>
				</div>

				<div class="mb-3">
					<label for="lbl_direccion" class="form-label"><b>Direccion</b></label>
					<input type="text" name="txt_direccion" id="txt_direccion" class="form-control" placeholder="Calle----Avenida----Lugar---- #Casa" required>
				</div>

				<div class="mb-3">
					<label for="lbl_telefono" class="form-label"><b>Telefono</b></label>
					<input type="number" name="txt_telefono" id="txt_telefono" class="form-control" placeholder="12345678" required>
				</div>

				<div class="mb-3">
				  <label for="lbl_puesto" class="form-label"><b>Puesto</b></label>
				  <select class="form-select" name="drop_puesto" id="drop_puesto" required>
					<option value=0>--- Puestos ---</option>
					
					<?php
						while($fila = $resultado->fetch_assoc()){
							echo"<option value=". $fila['id'] .">". $fila['puesto'] ."</option>";
						}
						$db_conexion->close();
					?>
                 
				  </select>
				</div>
				

				<div class="mb-3">
					<label for="lbl_fn" class="form-label"><b>Fecha de Nacimiento</b></label>
					<input type="date" name="txt_fecha_nacimiento" id="txt_fecha_nacimiento" class="form-control" placeholder="dd/mm/aaaa" required>
				</div>
				


				<div class="mb-3">
					<input type="submit" name="btn_agregar" id="btn_agregar" class="btn btn-primary btn-lg btn-block" value="Agregar">
				</div>



			  </div>
		  </form>
		
		  <br>

		  <table class="table table-striped table-inverse table-responsive">
			  <thead class="thead-inverse">
				  <tr>
					  Codigo</th>
					  <th>Nombres</th>
					  <th>Apellidos</th>
					  <th>Direccion</th>
					  <th>Telefono</th>
					  <th>Nacimiento</th>
					  <th>Puesto</th>
				  </tr>
				  </thead>
				  <tbody>
				    
					<?php
					 include("datos_conexion.php");
					 $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
					 $db_conexion ->real_query("select e.id_empleado,e.codigo,e.nombres,e.apellidos,e.direccion,e.telefono,e.fecha_nacimiento,
					 p.puesto from db_empresa_2021.empleados as e inner join db_empresa_2021.puestos as p on e.id_puesto = p.id_puesto  ;");
					 $resultado = $db_conexion->use_result();   
						while($fila = $resultado->fetch_assoc()){
							echo "<tr data-id=". $fila['id_empleado'] .">";
								echo"<td>". $fila['codigo'] ."</td>";
								echo"<td>". $fila['nombres'] ."</td>";
								echo"<td>". $fila['apellidos'] ."</td>";
								echo"<td>". $fila['direccion'] ."</td>";
								echo"<td>". $fila['telefono'] ."</td>";
								echo"<td>". $fila['fecha_nacimiento'] ."</td>";
								echo"<td>". $fila['puesto'] ."</td>";
								echo"<td><a href='editar_emp.php?id=".$fila['id_empleado']."' class='btn btn-info'>Editar Empleado</a></td>";
								echo"<td><a href='eliminar_emp.php?id=".$fila['id_empleado']."' class='btn btn-danger'>Eliminar </a></td>";
								
							echo"</tr>";
						}
						$db_conexion->close();
					?>
				  </tbody>
		  </table>

	  </div>						

	<!-- Bootstrap JavaScript Libraries -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
