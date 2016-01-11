<?php
	session_start();
	if(!$_GET){
		echo "Hubo un error al desplegar esta página :( ";
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
			$sql = "SELECT * FROM Movimiento WHERE id_alumno = $idAlumno order by id_movimiento desc limit 0,1";
			$res = mysql_query($sql, $con) or die("Hubo un error al obtener los datos: ".mysql_error());
			$reg = mysql_fetch_array($res) or die("Error al transformar en array: ".mysql_error());
			$idGrupo = $reg['id_grupo_acursar'];

			$sqlG = "SELECT * FROM Grupo WHERE id_grupo = '$idGrupo'";
			$resG = mysql_query($sqlG,$con) or die("Error al obtener el ultimo grupo: ".mysql_error());
			$regG = mysql_fetch_array($resG)or die("Error al transformar en array: ".mysql_error());
			$grupoAnterior=	$regG['nivel']."/".$regG['grupo_numero'];
			$idGrupoAnterior = $regG['id_grupo'];
			$sqlDatos = "SELECT * FROM Persona, Alumno WHERE Persona.id_persona = '$idAlumno' and Alumno.id_alumno = Persona.id_persona";
			$resDatos = mysql_query($sqlDatos,$con) or die("Hubo un error al Obtener datos de alumno: ".mysql_error());
			$regDatos = mysql_fetch_array($resDatos) or die("Hubo un error en regDatos");
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
	<div class="container" >
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2" id="div-form-alumno">
				<form action="accionAlumno.php" method="post" name="form-alumno" id="form-alumno">
					<fieldset>
						<?php
							if($nuevo == 0){
								echo "<legend> Actualizar Datos</legend>";
							}else{
								echo "<legend> Inscribirse</legend>";
							}
						?>
					<div class="form-group">
						<label for="numControl">Número Control: </label><input type="text" name="numControl" id="numControl" class="form-control" <?php if($nuevo == 0 && $_SESSION['tipo'] == 'alumno'){ echo "value='".$regDatos['no_control']."' readonly"; }?> required>
					</div>
					<div class="form-group">
						<label for="nombre">Nombre: </label><input type="text" name="nombre" id="nombre" class="form-control" <?php if($nuevo == 0 && $_SESSION['tipo'] == 'alumno'){ echo "value='".$regDatos['nombre']."' readonly"; }?> required>
					</div>

					<div class="form-group">
						<label for="apellidos">Apellidos: </label><input type="text" name="apellidos" id="apellidos" class="form-control" <?php if($nuevo == 0 && $_SESSION['tipo'] == 'alumno'){ echo "value='".$regDatos['apellidos']."' readonly"; }?> required>
					</div>

					<div class="form-group">
						<label for="correo">Correo: </label><input type="email" name="correo" id="correo" class="form-control" <?php if($nuevo == 0 && $_SESSION['tipo'] == 'alumno'){ echo "value='".$regDatos['correo']."'"; }?> required>
					</div>

					<div class="form-group">
						<label for="pass">Contraseña: </label><input type="password" name="pass" id="pass" class="form-control" <?php if($nuevo == 0 && $_SESSION['tipo'] == 'alumno'){ echo "value='".$regDatos['password']."'"; }?> required>
					</div>

					<div class="form-group">
						<label for="passConf">Confirmar Contraseña: </label><input type="password" name="passConf" id="passConf" class="form-control" required>
					</div>



					<div class="form-group">
						<label for="telefono">Telefono: </label><input type="tel" name="telefono" id="telefono" class="form-control" <?php if($nuevo == 0 && $_SESSION['tipo'] == 'alumno'){ echo "value='".$regDatos['telefono']."'"; }?> required>
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
						<label for="semestre">Semestre: </label><input type="number" name="semestre" id="semestre" class="form-control" <?php if($nuevo == 0 && $_SESSION['tipo'] == 'alumno'){ echo "value='".$regDatos['semestre']."'"; }?> required>
					</div>
						 <?php echo "<input type='hidden' name='nuevo' value='".$nuevo."' readonly></br>";?>
						  <?php echo "<input type='hidden' name='idGrupoAnterior' value='".$idGrupoAnterior."' readonly></br>";?>
					Grupo anterior: <?php echo "<input type='text' name='grupoAnterior' value='".$grupoAnterior."' class='form-control' readonly></br>"; ?>
					Grupos disponibles: </br>

					<?php

						while($reg1 = mysql_fetch_array($res1)){
							echo "<div class='form-group'>"
								."<label class='radio-inline'><input type='radio' name='grupo' id='grupo' value='".$reg1['id_grupo']."' >"
								.$reg1['nivel']."/".$reg1['grupo_numero']
								."</label></div>";
						}

					?>
				</fieldset>
					<a href="includes/cerrarSesion.php">Salir</a>
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