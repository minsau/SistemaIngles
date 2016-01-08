<?php
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicia Sesión</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="includes/css/bootstrap.min.css">
	<link rel="stylesheet" href="includes/css/style.css">
</head>
<body>
	<div class="container " >
		<div class="row vertical-center ">
			<div class="col-lg-6 col-lg-offset-3 " name="formulario" id="div-login">
				<form action="loguear.php" id="form-login" method="post" role="form">
					<div class="form-group">
						<label> Correo: </label> <input type="email" name="correo" id="correo" class="form-control" required>
					</div>	

					<div class="form-group">
						<label> Contraseña:  </label> <input type="password" name="pass" id="pass" class="form-control" required>
					</div>

					<input type="submit" value="Ingresar" class="btn btn-primary">	Si eres nuevo por favor <a href="alumno.php?nuevo=0"> Registrate </a>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="includes/js/jquery.js"></script>
	<script type="text/javascript" src="includes/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="includes/js/jquery.validate.js"></script>
</body>
</html>