<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Manejo de VideoClub</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/videoclub.js"></script>
	<script src="js/dropdown-menu.js"></script>
</head>

<body>
	<?php include 'menu.html';?>
	<section class="estilos_form">
		<form method="POST" enctype="multipart/form-data" action="" id="form_peliculas">		
			<fieldset class="insertar_peliculas">
				<div class="filas">	
			    	<label for="nombre">Nombre Pelicula: </label>
			    	<input type="text" name="nombre_pelicula" id="nombre_pelicula">
			    </div>

				<div class="filas">
					<label for="precio_alquiler">Precio de alquiler:</label>
					<input type="text" name="precio_alquiler" id="precio_alquiler">
				</div>
				<div class="filas">
					<label for="duracion">Duracion :</label>
					<input type="text" name="duracion" id="duracion">
				</div>
				<div class="filas">
					<label for="genero">Genero:</label>
					<select id="genero"></select><!-- TODO llenar con dropdown de genero-->
					<input type="hidden" name="genero" id="hidden_genero">
				</div>
				<div class="filas">
			    	<input type="button" value="Insertar" class="button" id="crear_peliculas">
			    	<input type="hidden" name="action" value="upload" /> 
			    </div>
			</fieldset>
		</form>
	</section>
</body>

</html>
