<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Manejo de VideoClub</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="js/jquery-2.1.3.min.js"></script>
	
	<script src="js/videoclub.js"></script>
	<script src="js/dropdown-menu.js"></script>
	<script src="js/bootstrap.js"></script>
    <!--<link rel="stylesheet" type="text/css" href="css/estilos.css">-->

</head>

<body>
	<nav id="top-nav" class="navbar navbar-inverse navbar-static-top">

		<div class="container-fluid">
			<div class="navbar-header">
	          <a class="navbar-brand" href="#">Video Club</a>
	        </div>
			<!--<div class="navbar-collapse collapse">
				
			</div>
			<div class="navbar-collapse collapse">
				<a class="navbar-brand" href="logout.php"> Cerrar Session</a>
			</div>-->

			<div class="navbar-collapse collapse">
			  <ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown">
				 	<a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
						<i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION["nombre_usuario"]; ?>
						<span class="caret"></span>
					</a>
					<ul id="g-account-menu" class="dropdown-menu" role="menu">
						<li><a href="logout.php"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
					</ul>
				</li>

			  </ul>

			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 sidebar">
				<?php include 'includes/menu.php';?>

			</div>
			<div class="col-sm-9 main">
				<h3><?php echo "Bienvenido ". $_SESSION["nombre_usuario"];?></h3>
			</div>
		</div>
	</div>
</body>

</html>

