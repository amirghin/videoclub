<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Manejo de VideoClub</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
    <!--<link rel="stylesheet" type="text/css" href="css/estilos.css">-->

</head>

<body>
	<nav id="top-nav" class="navbar navbar-inverse navbar-static-top">

		<div class="container-fluid">
			<div class="navbar-header">
	          <a class="navbar-brand" href="#">Video Club</a>
	        </div>
			<div class="navbar-collapse collapse">
				<a class="navbar-brand" href="#"><?php echo "Bienvenido ". $_SESSION["nombre_usuario"];?></a>
			</div>
			<div class="navbar-collapse collapse">
				<a class="navbar-brand" href="logout.php"> Cerrar Session</a>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<h3><i class="glyphicon glyphicon-briefcase"></i> Busqueda peliculas</h3>
		  		<hr>
				<ul class="nav nav-stacked">
					<li><a href="">Buscar peliculas</a></li>
				</ul>
			</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main"></div>
		</div>
	</div>
</body>

</html>

