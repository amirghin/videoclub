<!DOCTYPE html>
<html>
<head>
	<title>Insertar clientes</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>
<?php include 'menu.html';?>

<body>
	<section class="estilos_form">
		<form action="" method="POST" >
			<fieldset>
				<div class="filas">
					<label for="nombre_cliente">Nombre:</label>
					<input type="text" name="nombre_cliente">					
				</div>
				<div class="filas">
					<label for="apellidos">Apellidos:</label>
					<input type="text" name="apellidos">
				</div>
				<div class="filas">
				    <label for="email">Email:</label>
				    <input type="text" name="email">
				</div>
				<div class="filas">
				    <label for="fecha_nacimiento">Fecha de nacimiento</label>
				    <input type="text" name="fecha_nacimiento">
				</div>
				<div class="filas">
				    <label for="tel_casa">Telefono Casa</label>
				    <input type="text" name="tel_casa">
				</div>
				<div class="filas">
				    <label for="tel_celular">Celular</label>
				    <input type="text" name="tel_celular">
				</div>
				<div class="filas">
				    <label for="observaciones">Observaciones</label>
				    <textarea name="observaciones" id="" cols="30" rows="10"></textarea>
				</div>
				<div class="filas">
				    <input type="submit" class="button" value="Insertar">
				</div>
			</fieldset>
		</form>
	</section>
</body>
</html>