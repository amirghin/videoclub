<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estilos.css">
	<script type="text/javascript" src="js/dropdown-menu.js"></script>		
</head>
<body>
	<?php include 'menu.html';?>
	<p align="right">Bienvenido <?php echo $_SESSION["nombre_usuario"]?></p>
</body>
</html>