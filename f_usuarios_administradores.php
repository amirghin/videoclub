<!DOCTYPE html>
<html>
<head>
	<title>Insertar usuarios</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>
<body>
	<section class="estilos_form">
		<form method="POST" action="">
			<fieldset>
				<div class="filas">
					<label for="nombre">Nombre: </label>
					<input type="text" name="nombre">
				</div>
				<div class="filas">
					<label for="apellido">Apellido: </label>
					<input type="text" name="apellido">
				</div>
				<div class="filas">
					<label for="nombre_usuario">Nombre de usuario: </label>
					<input type="text" name="nombre_usuario">
				</div>
				<div class="filas">
					<label for="contrasena">Contrasena: </label>
					<input type="text" name="contrasena">
				</div>
				<div class="filas">
					<label for="habilitado">Habilitado: </label>
					<input type="checkbox" name="habilidato">
				</div>
				<div class="filas">
				    <input type="submit" value="Enviar" class="button">
				</div>
			</fieldset>
		</form>
	</section>
</body>
</html>