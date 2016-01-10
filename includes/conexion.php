<?php
	$con = mysql_connect('localhost','root','goaa941025') or die("Error al conectar"+mysql_error());
	$db = "Ingles";
	//if(isset($con)){
	//	echo "Conexión realizada exitosamente";
	//}
	mysql_select_db($db);
	mysql_query("SET NAMES 'UTF-8'");

?>
