<?php

require_once("includes/conexion.php");
$sql = "select m.cedula,p.nombre,p.correo from Persona as p, Maestro as m where p.id_persona=m.id_maestro";
$res = mysql_query($sql, $con) or die("Hubo un error al obtener los datos: ".mysql_error());

?>

<!DOCTYPE html>
<html>
<head>
  <title>Docentes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="includes/css/bootstrap.min.css">
  	 <script type="text/javascript" src="includes/js/jquery.js"></script>
         <script type="text/javascript" src="includes/js/bootstrap.min.js"></script>
         <script type="text/javascript" src="includes/js/jquery.validate.js"></script>

  <style>
  body {
      position: relative; 
  }
  #Docentes {padding-top:50px;height:700px;color: #fff; background-color: #1E88E5;}
  #AsignarGrupos {padding-top:50px;height:700px;color: #fff; background-color: #673ab7;}
  #NuevoDocente {padding-top:50px;height:700px;color: #fff; background-color: #ff9800;}
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Docencia</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#Docentes">Docentes</a></li>
          <li><a href="#AsignarGrupos">Asignar Grupos</a></li>
          <li><a href="#NuevoDocente">Nuevo Docente</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div id="Docentes" class="container-fluid">
  <h1>Docentes </h1>
<div class="container">
  <p>En este apartado usted puede editar los datos de los doccenes o en otro caso eliminarlos del sistema:</p>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Cedula</th>
        <th>Nombre</th>
	<th>Correo</th>
	<th>Opciones</th>
      </tr>
    </thead>
    <tbody>
	<?php
		while($reg = mysql_fetch_array($res)){
	?>
      <tr>
	<td> <?php echo $reg["cedula"];?> </td>
        <td> <?php echo $reg["nombre"];?> </td>
	<td> <?php echo $reg["correo"];?> </td>
	<td>
		<button type="button" class="btn btn-default btn-sm">
		<a href="#NuevoDocente">
        	<span class="glyphicon glyphicon-pencil"></span> Editar
		</a>
	        </button>
		<button type="button" class="btn btn-default btn-sm">
   	        <span class="glyphicon glyphicon-remove"></span> Eliminar

	        </button>
	</td>
      </tr>
	<?php } ?>
    </tbody>
  </table> </div>

</div> <div id="AsignarGrupos" class="container-fluid">

  <h1>Asignar Grupos</h1>
 <div class="container">
  <h2>Form control: inline radio buttons</h2>
  <p>The form below contains three inline radio buttons:</p>
  <form role="form">
    <label class="radio-inline">
      <input type="radio" name="optradio">Nivel A
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio">Nivel B
    </label>
    <label class="radio-inline">
      <input type="radio" name="optradio">Nivel C
    </label>
  </form>
 </div>
</div>

<div id="NuevoDocente" class="container-fluid">
  <h1>Nuevo Docente</h1>
<p>Si ustde requiere agregar a un nuevo docente, llene los campos y Guarde.</p>
 <div class="container">
  <form class="form-horizontal" role="form">
    <div class="form-group">
      <label class="control-label col-sm-2">Nombre:</label>
      <div class="col-sm-10">
        <input type="text" name="nombre_decente"class="form-control" id="nombre_docente" placeholder="Digite Nombre">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Apellidos:</label>
      <div class="col-sm-10">
        <input type="text" name="apellidos_docente" class="form-control" id="apellidos_docente" placeholder="Digite Apellidos">
      </div>
    </div>

   <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" name="correo_docente" class="form-control" id="email" placeholder="Digite Correo">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">
        <input type="password" name="password"  class="form-control" id="pwd" placeholder="Digite Password">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2">Cedula:</label>
      <div class="col-sm-10">
        <input type="number" name="cedula" class="form-control" id="cedula" placeholder="Digite Cedula" min="1" max="10">
      </div>
    </div>


    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </form>
</div>
</div>
</body>
</html>

