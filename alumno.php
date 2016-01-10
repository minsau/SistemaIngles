<?php
	session_start();
	if(!$_GET){
		echo "hubo un error al desplegar esta página :( ";
	}else{
		require_once("includes/conexion.php");
		$nuevo = $_GET['nuevo'];
		if($nuevo == 1){
			$sql = "SELECT * FROM Grupo WHERE id_grupo = 2";
			$res = mysql_query($sql, $con) or die("Hubo un error al obtener los datos: ".mysql_error());
			$reg = mysql_fetch_array($res) or die("Error al transformar en array: ".mysql_error());
			$grupoAnterior=	$reg['nivel'];
		}else if($nuevo == 0){
			$idAlumno = $_SESSION['id'];
			$sql = "SELECT * FROM Movimiento WHERE idAlumno = $idAlumno";
			$res = mysql_query($sql, $con) or die("Hubo un error al obtener los datos: ".mysql_error());
			$reg = mysql_fetch_array($res) or die("Error al transformar en array: ".mysql_error());
			$grupoAnterior=	$reg['nivel']." ".$reg['dias']." ".$reg['horario'];
		}

		$sql1 = "SELECT * FROM Grupo WHERE nivel!='Nuevo'";
		$res1 = mysql_query($sql1, $con) or die("Hubo un error al obtener los datos: ".mysql_error());
		// or die("Error al transformar en array: ".mysql_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<?php 
		if($nuevo == 0)
			echo "<title> Modificar datos </title>";
		else
			echo "<title> Página de Inscripción </title>";
	 ?>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="includes/css/bootstrap.min.css">
	<link rel="stylesheet" href="includes/css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<form action="accionAlumno.php" method="post" name="form-alumno" id="form-alumno">
					<div class="form-group">
						<label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="apellidos">Apellidos: </label><input type="text" name="apellidos" id="apellidos" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="correo">Correo: </label><input type="email" name="correo" id="correo" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="pass">Contraseña: </label><input type="password" name="pass" id="pass" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="passConf">Confirmar Contraseña: </label><input type="password" name="passConf" id="passConf" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="numControl">Número Control: </label><input type="text" name="numControl" id="numControl" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="telefono">Telefono: </label><input type="tel" name="telefono" id="telefono" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="carrera">Carrera: </label>
						<select name="carrera" id="carrera" class="form-control" required>
							<?php
								$sqlCarreras = "SELECT * FROM Carrera";
								$resCarreras = mysql_query($sqlCarreras,$con) or die("Hubo un Error al obtener las carreras: ".mysql_error());

								while($regCarrera = mysql_fetch_array($resCarreras)){
									echo "<option value='".$regCarrera['id_carrera']."'>".$regCarrera['nombre']."</option>";
								}

							?>
						</select>
					</div>

					<div class="form-group">
						<label for="semestre">Semestre: </label><input type="number" name="semestre" id="semestre" class="form-control" required>
					</div>
						 <?php echo "<input type='hidden' name='nuevo' value='".$nuevo."' readonly></br>"; ?>
					Grupo anterior: <?php echo "<input type='text' name='grupoAnterior' value='".$grupoAnterior."' readonly></br>"; ?>
					Grupos disponibles: </br>

					<?php

						while($reg1 = mysql_fetch_array($res1)){
							echo "<div class='form-group'>"
								."<label class='radio-inline'><input type='radio' name='grupo' id='grupo' value='".$reg1['id_grupo']."'>"
								.$reg1['nivel']."/".$reg1['grupo_numero']
								."</label></div>";
						}

					?>
					<input type="submit" value="Enviar" class="btn btn-primry">
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
	}
?>