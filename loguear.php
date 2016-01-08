<?php

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
			echo "Correo encontrado";
		}


	}

?>
