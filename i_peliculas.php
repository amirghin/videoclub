<?php session_start();?>
<?php include 'includes/header.php';?>

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
			<div class="col-sm-3 ">
				<?php include 'includes/menu.php';?>
			</div>
			<div class="col-sm-9 ">
			   <h3><i class="glyphicon glyphicon-dashboard"></i> Ingresar pelicula</h3>  
					
			   <hr>
				<section class="estilos_form">
					<form method="POST" enctype="multipart/form-data" action="" id="form_peliculas" class="form-horizontal">		
						<fieldset class="insertar_peliculas">
							<div class="filas form-group">	
						    	<label for="nombre">Nombre Pelicula: </label>
						    	<input type="text" name="nombre_pelicula" id="nombre_pelicula">
						    </div>

							<div class="filas form-group">
								<label for="precio_alquiler">Precio de alquiler:</label>
								<input type="text" name="precio_alquiler" id="precio_alquiler">
							</div>
							<div class="filas form-group">
								<label for="duracion">Duracion :</label>
								<input type="text" name="duracion" id="duracion">
							</div>
							<div class="filas form-group">
								<label for="genero">Genero:</label>
								<select id="genero"></select><!-- TODO llenar con dropdown de genero-->
								<input type="hidden" name="genero" id="hidden_genero">
							</div>
							<div class="filas form-group">
						    	<input type="button" value="Insertar" class="button" id="crear_peliculas">
						    	<input type="hidden" name="action" value="upload" /> 
						    </div>
						</fieldset>
					</form>
				</section>
			</div>
		</div>
	</div>
</body>

</html>
