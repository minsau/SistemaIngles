<?php
	session_start();
	require_once("includes/conexion.php");
	if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'docente'){
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Aprobar solicitud</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="includes/css/bootstrap.min.css">
	<link rel="stylesheet" href="includes/css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3 vertical-aligment">
				<form method="post" action="#" name="form-aprobar" id="form-aprobar">
					<fieldset>
						<legend>Aprobar solicitudes <a href="includes/cerrarSesion.php">Salir</a></legend>
						<div class="form-group">
							<label for="buscar">Buscar: </label><input type="search" name="buscar" id="buscar" class="form-control"placeholder="Ingresa el numero de control" />
						</div>	
							<input type="submit" value="Buscar" class="btn btn-primary">
					</fieldset>

					<fieldset>
						<?php
							if(!$_POST){
								echo "<h3 class='text-primary' > Presione el Botón Buscar </h3>";
							}else{
								$buscar = $_POST['buscar'];
								$sql = "SELECT c.no_control, a.nombre, a.apellidos, b.tipo,b.estado,b.id_movimiento FROM Persona as a, Movimiento as b, Alumno as c where c.no_control = '$buscar' and c.id_alumno = b.id_alumno and c.id_alumno = a.id_persona order by b.id_movimiento desc limit 0,1";
								$res = mysql_query($sql, $con) or die("Error al obtener datos de Alumno: ".mysql_error());
								$reg = mysql_fetch_array($res);
								

						?>

							
								<fieldset>
									<legend>Alumno encontrado</legend>
									
									<?php
										echo "<label> Numero de Control: ".$reg['no_control']."</label></br> <label> Nombre: ".$reg['nombre']."</label></br> <label> Apellidos: ".$reg['apellidos']."</label></br> <label> Estado: ".$reg['estado']."</label></br><br>";
									?>
									<!--<input type="submit" value="Aprobar" class="btn btn-success">-->
									<a href="accionAprobar.php?aprobado=1&mov=<?php echo $reg['id_movimiento'];  ?>"class="btn btn-success">Aprobar</a>
									<a href="accionAprobar.php?aprobado=0&mov=<?php echo $reg['id_movimiento'];  ?>" class="btn btn-danger">Rechazar</a>
								</fieldset>
							
						<?php
							}
						?>
					</fieldset>
				</form>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="includes/js/jquery.js"></script>
	<script type="text/javascript" src="includes/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="includes/js/jquery.validate.js"></script>
	
</body>
</html>

<?php
	}else{
		echo "Error en los datos de sesion";
	}
?>