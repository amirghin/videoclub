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
				<h3><i class="glyphicon glyphicon-dashboard"></i> Ingresar un usuario administrador</h3>  
						
				<hr>
				<section class="estilos_form">
					<!--<form action="" method="POST">-->
						<div class="filas form-group">
							<label for="">Ingrese el nombre del usuario</label>
							<input type="text" name="nombre_usuario" id="nombre_usuario">
							
						</div>
						<div class="filas form-group">
							<input type="button" value="Enviar" id="button" class="button">
						</div>

						<table id="result" class="table"></table>
						
					
					<!--</form>-->
				</section>


				<section class="estilos_form hidden" id="form_m_usuarios">
					<form method="POST" action="" id="insert_usuario_administrador">
						<fieldset>
							<div class="filas">
								<label for="nombre" id="nombre">Nombre: </label>
								<input type="text" name="nombre" required>
							</div>
							<div class="filas">
								<label for="apellido" id="apellido">Apellido: </label>
								<input type="text" name="apellido">
							</div>
							<div class="filas">
								<label for="nombre_usuario" id="nombre_usuario">Nombre de usuario: </label>
								<input type="text" name="nombre_usuario">
							</div>
							<div class="filas">
								<label for="contrasena" id="contrasena">Contrase&ntilde;a: </label>
								<input type="password" name="contrasena" id="contrasena">
							</div>
							<div class="filas">
								<label for="conf_contrasena" id="conf_contrasena">Confirme la Contrase&ntilde;a: </label>
								<input type="password" name="conf_contrasena" id="conf_contrasena">
							</div>
							<div class="filas">
								<label for="habilitado" id="habilidato">Habilitado: </label>
								<input type="checkbox" name="habilitado" checked>
							</div>
							<div class="filas">
							    <input type="button" value="Eliminar Usuario" class="button" id="crear_usuario">
							</div>
						</fieldset>
					</form>
				</section>
			</div>
		</div>
	</div>
</body>
</html>