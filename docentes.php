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
      <tr>
        <td>1</td>
        <td>Anna</td>
	<td>anna@gmail.com</td>
	<td>
		<button type="button" class="btn btn-default btn-sm">
        	<span class="glyphicon glyphicon-pencil"></span> Editar
	        </button>
		<button type="button" class="btn btn-default btn-sm">
   	        <span class="glyphicon glyphicon-remove"></span> Eliminar
	        </button>
	</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Debbie</td>
	<td>debbie@gmail.com</td>
      </tr>
      <tr>
        <td>3</td>
        <td>John</td>
	<td>john@gmail.com</td>
      </tr>
    </tbody>
  </table> </div>

</div> <div id="AsignarGrupos" class="container-fluid">
  <h1>Asignar Grupos</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation 
bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation 
bar while scrolling!</p> </div> <div id="NuevoDocente" class="container-fluid">
  <h1>Nuevo Docente</h1>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation 
bar while scrolling!</p>
  <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation 
bar while scrolling!</p> </div>

</body> </html>

