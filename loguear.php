<?php
	session_start();
	if(!$_POST){
		echo "No hay datos de inicio de sesión, por favor intenta volver a loguearte <a href='index.php'> Iniciar Sesión </a>";
	}else{
		require_once('includes/conexion.php');
		$correo = $_POST['correo'];
		$pass = $_POST['pass'];

		$sql = "SELECT * FROM Persona WHERE correo = '$correo'";
		$res = mysql_query($sql,$con); 

		if(mysql_num_rows($res) < 1){
			echo "<script type='text/javascript'>".
				"alert('Correo no encontrado, se redireccionara a la página de inscripciones');".
				"document.location.href = 'alumno.php?nuevo=1';</script>";
		}else{
			$reg = mysql_fetch_array($res) or die("Error al convertir en registros");
			if($reg['password'] == $pass){
				$_SESSION['correo'] = $correo;
				$_SESSION['tipo'] = $reg['tipo'];
				$_SESSION['id'] = $reg['id_persona'];

				if($reg['tipo'] = 'alumno'){
					header("Location: alumno.php?nuevo=0");
				}	

				if($reg['tipo'] = 'docente'){
					header("Location: aprobar.php");
				}	
			}else{
				echo "<script type='text/javascript'>".
				"alert('Contraseña incorrecta');".
				"document.location.href = 'index.php';</script>";
			}
		}


	}

?>
