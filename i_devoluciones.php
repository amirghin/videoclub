<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Manejo de VideoClub</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/videoclub.js"></script>
	<script src="js/dropdown-menu.js"></script>
</head>

<body>
	<?php include 'menu.html';?>
	<section class="estilos_form">
		<form method="POST" enctype="multipart/form-data" action="" id="form_peliculas">		
			<fieldset class="insertar_peliculas">
				<div class="filas">	
			    	<label for="nombre">ID de reservacion:  </label>
			    	<input type="text" name="id_reservacion" id="id_reservacion" class="requerido">
			    </div>
				<div class="filas">
					<label for="">Cargos</label>
					<select name="cargos" id="cargos"></select>
				</div>
				<div class="filas">
					<label for="precio_alquiler">Observaciones:</label>
					<textarea name="observaciones" id="observaciones" cols="30" rows="5" class="requerido"></textarea>
				</div>
				<div class="filas">
					<!--<input type="hidden" id="hidden_cargos" name="id_cargo">-->
			    	<input type="button" value="Insertar" class="button" id="insertar_devoluciones">
			    </div>
			</fieldset>
		</form>
	</section>
</body>

</html>
