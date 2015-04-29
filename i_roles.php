<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Insertar Roles</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script src="js/jquery-2.1.3.min.js"></script>
		<script src="js/videoclub.js"></script>
		<script src="js/dropdown-menu.js"></script>

</head>


<body>
	<?php include 'menu.html';?>
	<section class="estilos_form">
		<form action="" id="i_generos" method="POST">
			<fieldset>
				<div class="filas">
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre_rol" id="nombre_rol" class="requerido">
				</div>
				<div class="filas">
					<input type="button" value="Insertar" class="button" id="insertar_rol">
					<span class="Mensaje" id="Mensaje"></span>					
				</div>

			</fieldset>
		</form>
	</section>
</body>
</html>