
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Manejo de VideoClub</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>

<body>
	<section class="estilos_form">
		<form method="POST">		
			<fieldset class="insertar_peliculas">
				<div class="filas">	
			    	<label for="nombre">Nombre Pelicula: </label>
			    	<input type="text" name="nombre_pelicula" id="nombre_pelicula">
			    </div>
			    <div class="filas">
			    	<label for="nombre_pelicula">Nombre: </label>
			    	<input type="text" name="nombre_pelicula" id="nombre_pelicula">
				</div>
				<div class="filas">
					<label for="precio_alquiler">Precio de alquiler:</label>
					<input type="text" nombre="precio_alquiler">
				</div>
				<div class="filas">
					<label for="genero">Genero:</label>
					<select name="genero" id=""></select>
					<!-- TODO llenar con dropdown de genero-->
				</div>
				<div class="filas">
					<label for="ruta_imagenes">Ruta de imagenes: </label>
					<input type="file" name="ruta_imagenes"/>
				</div>
				<div class="filas">
			    	<input type="submit" value="Iniciar Sesion" class="button">
			    </div>
			</fieldset>
		</form>
	</section>
</body>

</html>
