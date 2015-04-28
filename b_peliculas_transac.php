<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Manejo de VideoClub</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script src="js/jquery-2.1.3.min.js"></script>
		<script src="js/dropdown-menu.js"></script>

</head>
<body>
	<?php include 'menu.html';?>
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

			<table id="result"></table>
		<!--</form>-->
	</section>

	<section class="estilos_form hidden" id="f_reservar_peliculas">
		<div class="filas">
			<label for="">ID Cliente:</label>
			<input type="text" name="id_cliente" id="id_cliente" class="requerido">
		</div>
		<div class="filas">
			<input type="hidden" name="estado_aprobacion" id="estado_aprobacion" value="pendiente">
			<input type="hidden" name="id_copia" id="id_copia" >
		</div>
		<div class="filas">
			<label for="">Fecha entrega</label>
			<input type="date" name="fecha_entrega" id="fecha_entrega" class="requerido" disabled>
		</div>
		<div class="filas">
			<label for="">Fecha reservacion</label>
			<input type="date" name="fecha_reservacion" id="fecha_reservacion" class="requerido" disabled>
		</div>
		<div class="filas">
			<label for="">Fecha retiro</label>
			<input type="date" name="fecha_retiro" id="fecha_retiro" class="requerido" disabled>
		</div>
		<div class="filas">
			<label for="">Hora retiro</label>
			<input type="time" name="hora_retiro" id="hora_retiro" class="requerido" disabled>
		</div>
		<div class="filas">
			<input type="button" value="reservar" id="insertar_reserva">
		</div>
	</section>

	<script src="js/videoclub.js"></script>

</body>
</html>