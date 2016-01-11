<?php
	session_start();
	if(!isset($_SESSION['tipo']) || $_SESSION['tipo'] != 'docente'){
		echo "Ha habido un error con los datos";
		header("Location: index.php");
	}else{
		if(!$_GET){
			echo "No se han recibido datos";
		}else{
			require_once("includes/conexion.php");
			$aprobado = $_GET['aprobado'];
			$idMovimiento = $_GET['mov'];
			if($aprobado == 1){
				$sql = "UPDATE Movimiento set estado = 'Aceptado' WHERE id_movimiento = '$idMovimiento'";
			}else{
				$sql = "UPDATE Movimiento set estado = 'Rechazado' WHERE id_movimiento = '$idMovimiento'";
			}
			
			$res = mysql_query($sql,$con) or die("Hubo un erroral actualizar el estado: ".mysql_error());
			header("Location: aprobar.php");
		}
	}
?>
