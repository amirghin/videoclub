<?php session_start();
if($_SESSION["id_usuario"] == "2" || (!isset($_SESSION["id_usuario"]))) {header("Location: login.php");}?>
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
				<h3><i class="glyphicon glyphicon-dashboard"></i> Ingresar una devolucion</h3>  
						
				<hr>
				<section class="estilos_form" id="i_devoluciones">
					<form method="POST" enctype="multipart/form-data" action="" id="form_peliculas">		
						<fieldset class="insertar_peliculas">
							<div class="filas form-group">	
						    	<label for="nombre">ID de reservacion:  </label>
						    	<input type="text" name="id_reservacion" id="id_reservacion" class="requerido">
						    </div>
							<div class="filas form-group">
								<label for="">Cargos</label>
								<select name="cargos" id="cargos"></select>
							</div>
							<div class="filas form-group">
								<label for="precio_alquiler">Observaciones:</label>
								<textarea name="observaciones" id="observaciones" cols="30" rows="5" class="requerido"></textarea>
							</div>
							<div class="filas form-group">
								<!--<input type="hidden" id="hidden_cargos" name="id_cargo">-->
						    	<input type="button" value="Insertar" class="button" id="insertar_devoluciones">
						    </div>
						</fieldset>
					</form>
				</section>
			</div>
		</div>
	</div>
</body>

</html>
