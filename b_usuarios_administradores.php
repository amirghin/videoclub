<?php

//require "conexion.php";
//require "search.php";


/*$search = new search;

if(isset($_POST["nombre_usuario"])){


	$search->buscar_usuarios($_POST["nombre_usuario"], $conexion);
}*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>Insertar usuarios</title>
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
			<table id="result">
				
			</table>
		
		<!--</form>-->
	</section>
		<script src="js/videoclub.js"></script>

</body>
</html>