<!DOCTYPE html>
<html>
<head>
	<title>Insertar generos</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>
<?php include 'menu.html';?>

<body>
	<section class="estilos_form">
		<form action="" method="POST" >
			<fieldset>
				<div class="filas">
					<label for="id_genero">ID Genero</label>
					<input type="text" name="id_genero">					
				</div>
				<div class="filas">
					<label for="nombre">Nombre</label>
					<input type="text">
				</div>
				<input type="submit">
			</fieldset>
		</form>
	</section>
</body>
</html>