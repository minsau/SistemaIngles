<?php
	session_start();
	if(!$_POST){
		echo "Error al desplegar la página, no se enviraron datos";
	}else{
		require_once("includes/conexion.php");
		$idAlumno = $_SESSION['id'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$correo = $_POST['correo'];
		$pass = $_POST['pass'];
		$passConf = $_POST['passConf'];
		$numControl = $_POST['numControl'];
		$telefono = $_POST['telefono'];
		$carrera = $_POST['carrera'];
		$semestre = $_POST['semestre'];
		$grupo = $_POST['grupo'];
		$grupoAnterior = $_POST['idGrupoAnterior'];
		$nuevo = $_POST['nuevo'];
		if($nuevo == 1 ){
			$sql = "INSERT INTO Persona values (null,'$nombre','$apellidos','$correo','$pass','alumno')";
			$res = mysql_query($sql,$con) or die("Error al insertar datos en Persona: ".mysql_error());

			$sqlData = "SELECT * FROM Persona order by id_persona desc";
			$resData = mysql_query($sqlData,$con) or die("Error al obtener datos en Persona: ".mysql_error());
			$regData = mysql_fetch_array($resData) or die("Error al convertir en registros");
			$idAlumno = $regData['id_persona'];

			$sqlAlumno = "INSERT INTO Alumno values ('$idAlumno','$numControl','$telefono','$carrera','$semestre')";
			$resAlumno = mysql_query($sqlAlumno,$con) or die("Error al insertar datos en Alumno: ".mysql_error());

			$sqlMovimiento = "INSERT INTO Movimiento values (null,'2','$grupo','$idAlumno','Inscripcion','Pendiente')";
			$resMovimiento = mysql_query($sqlMovimiento,$con) or die("Error al insertar datos en Movimiento: ".mysql_error());

			echo "<script type='text/javascript'>".
				"alert('Inscrito');".
				"document.location.href = 'index.php';</script>";
		}else{
			$sqlReincribir = "UPDATE Persona set correo = '$correo', password = '$pass' WHERE id_persona =$idAlumno";
			$resReinscribir = mysql_query($sqlReincribir, $con) or die("Hubo un error al actualizar los datos: ".mysql_error());

			$sqlReincribir = "UPDATE Alumno set telefono = '$telefono', id_carrera = '$carrera', semestre = '$semestre' WHERE id_alumno =$idAlumno";
			$resReinscribir = mysql_query($sqlReincribir, $con) or die("Hubo un error al actualizar los datos: ".mysql_error());

			$sqlMovimiento = "INSERT INTO Movimiento values (null,'$grupoAnterior','$grupo','$idAlumno','Reinscripcion','Pendiente')";
			$resMovimiento = mysql_query($sqlMovimiento,$con) or die("Error al insertar datos en Movimiento: ".mysql_error());

			echo "<script type='text/javascript'>".
				"alert('Reinscrito');".
				"document.location.href = 'index.php';</script>";
		}
	}


?>
