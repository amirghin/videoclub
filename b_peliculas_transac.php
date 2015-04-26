<!DOCTYPE html>
<html>
<head>
	<title>Buscar peliculas por nombre o genero</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script src="js/jquery-2.1.3.min.js"></script>

</head>
<body>
	<section class="estilos_form" id="b_peliculas_id">
		<!--<form action="" method="POST">-->
			<div class="filas">
				<label for="nombre_pelicula"></label>
				<input type="text" name="texto_busqueda" id="texto_busqueda" class="requerido">
			</div>
			<div class="filas">
				<label for="">Busqueda por genero</label>
				<input type="radio" name="busqueda" value="genero" class="filtros">
				<label for="">Busqueda por nombre</label>
				<input type="radio" name="busqueda" value="nombre" class="filtros">
			</div>

			<div>
				<input type="button" value="Enviar" id="buscar_peliculas">
			</div>
		<!--</form>-->
	</section>

	<script src="js/videoclub.js"></script>

</body>
</html>