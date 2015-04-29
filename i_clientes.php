<?php session_start();?>
<?php include 'includes/header.php';?>

<body>
	<nav id="top-nav" class="navbar navbar-inverse navbar-static-top">

		<div class="container-fluid">
			<div class="navbar-header">
	          <a class="navbar-brand" href="#">Video Club</a>
	        </div>
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
			<div class="col-sm-3 ">
				<?php include 'includes/menu.php';?>
			</div>
			<div class="col-sm-9 ">
				<h3><i class="glyphicon glyphicon-dashboard"></i> Formulario de afiliacion</h3>  
						
				<hr>
				<section class="estilos_form">
					<form action="" method="POST" class="form-horizontal">
						<fieldset>
							<div class="filas form-group">
								<label for="nombre_cliente">Nombre:</label>
								<input type="text" name="nombre_cliente">					
							</div>
							<div class="filas form-group">
								<label for="apellidos">Apellidos:</label>
								<input type="text" name="apellidos">
							</div>
							<div class="filas form-group">
							    <label for="email">Email:</label>
							    <input type="email" name="email">
							</div>
							<div class="filas form-group">
							    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
							    <input type="date" name="fecha_nacimiento">
							</div>
							<div class="filas form-group">
							    <label for="tel_casa">Telefono Casa:</label>
							    <input type="text" name="tel_casa">
							</div>
							<div class="filas form-group">
							    <label for="tel_celular">Celular:</label>
							    <input type="text" name="tel_celular">
							</div>
							<div class="filas form-group">
							    <label for="observaciones">Observaciones:</label>
							    <textarea name="observaciones" id="observaciones" cols="30" rows="5"></textarea>
							</div>
							<div class="filas form-group">
							    <input type="button" class="button" value="Enviar">
							</div>
						</fieldset>
					</form>
				</section>
			</div>
		</div>
	</div>
</body>
</html>