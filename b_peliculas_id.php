<!DOCTYPE html>
<html>
<head>
	<title>Buscar peliculas</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script src="js/jquery-2.1.3.min.js"></script>

</head>
<body>
	<section class="estilos_form" id="b_peliculas_id">
		<!--<form action="" method="POST">-->
			<div class="filas">
				<input type="text" name="id_pelicula" id="id_pelicula" class="requerido">
				<input type="button" value="Enviar" id="buscar_peliculas_id">
			</div>
		<!--</form>-->
	</section>

	<section class="estilos_form hidden" id="modificar">
		<form method="POST" enctype="multipart/form-data" action="" >		
			<fieldset class="insertar_peliculas">
				<div class="filas">
			    	<label for="nombre">ID Pelicula: </label>
			    	<input type="text" name="id_pelicula" id="id_pelicula" readonly>
				</div>
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
					<label for="ruta_imagenes">Ruta de imagenes: </label>
					<input type="text" name="ruta_imagenes" id="ruta_imagenes" />
				</div>
				<div class="filas">
			    	<input type="button" value="Modificar" class="button" id="modificar_peliculas">
			    	<input type="button" value="Eliminar" class="button" id="eliminar_peliculas">
			    	<input type="hidden" name="action" value="upload" /> 
			    	


			    </div>
			</fieldset>
		</form>
	</section>
		<script src="js/videoclub.js"></script>

</body>
</html>