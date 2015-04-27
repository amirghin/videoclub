<!DOCTYPE html>
<html>
<head>
	<title>Buscar usuarios</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script src="js/jquery-2.1.3.min.js"></script>

</head>
<body>
	<section class="estilos_form">
		<!--<form action="" method="POST">-->
			<div class="filas">
				<input type="text" name="nombre_usuario" id="nombre_usuario">
				<input type="button" value="Enviar" id="button">
			</div>

			<table id="result"></table>
			
		
		<!--</form>-->
	</section>


	<section class="estilos_form hidden" id="form_m_usuarios">
		<form method="POST" action="" id="insert_usuario_administrador">
			<fieldset>
				<div class="filas">
					<label for="nombre" id="nombre">Nombre: </label>
					<input type="text" name="nombre" required>
				</div>
				<div class="filas">
					<label for="apellido" id="apellido">Apellido: </label>
					<input type="text" name="apellido">
				</div>
				<div class="filas">
					<label for="nombre_usuario" id="nombre_usuario">Nombre de usuario: </label>
					<input type="text" name="nombre_usuario">
				</div>
				<div class="filas">
					<label for="contrasena" id="contrasena">Contrase&ntilde;a: </label>
					<input type="password" name="contrasena" id="contrasena">
				</div>
				<div class="filas">
					<label for="conf_contrasena" id="conf_contrasena">Confirme la Contrase&ntilde;a: </label>
					<input type="password" name="conf_contrasena" id="conf_contrasena">
				</div>
				<div class="filas">
					<label for="habilitado" id="habilidato">Habilitado: </label>
					<input type="checkbox" name="habilitado" checked>
				</div>
				<div class="filas">
				    <input type="button" value="Crear Usuario" class="button" id="crear_usuario">
				</div>
			</fieldset>
		</form>
	</section>
		<script src="js/videoclub.js"></script>

</body>
</html>