<?php session_start();
if($_SESSION["id_usuario"] == "2" || (!isset($_SESSION["id_usuario"]))) {header("Location: login.php");}?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Manejo de VideoClub</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/videoclub.js"></script>
</head>

<body>
	<section class="estilos_form">
		<form method="POST" enctype="multipart/form-data" action="" id="buscar_generos">		
			<fieldset class="">

				<div class="filas">
					<label for="genero">Genero:</label>
					<select id="genero"></select><!-- TODO llenar con dropdown de genero-->
					<input type="hidden" name="genero" id="hidden_genero">
				</div>
				<!--<div class="filas">
			    	<input type="button" value="Insertar" class="button" id="crear_peliculas">
			    	<input type="hidden" name="action" value="upload" /> 
			    </div>-->
			</fieldset>
		</form>
	</section>
	<section class="estilos_form hidden" id="form_m_generos">
		<form action="" id="i_generos" method="POST">
			<fieldset>
				<div class="filas">
					<label for="id_genero">ID Genero:</label>
					<input type="text" name="id_genero" id="id_genero" readonly>					
				</div>
				<div class="filas">
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre" id="nombre_genero">
				</div>
				<div class="filas">
					<input type="button" value="Modificar" class="button" id="modificar_genero">
					<input type="button" value="Eliminar" class="button" id="eliminar_genero">								
				</div>

			</fieldset>
		</form>
	</section>
</body>

</html>
