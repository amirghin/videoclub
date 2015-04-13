<?php
$mensaje = "";  
  require_once("conexion.php");
  include_once("generos.php");

  if ((isset($_POST['id_genero'], $_POST['nombre']))){
  	try{
  		$id_genero = $_POST['id_genero'];
  		$nombre = $_POST['nombre'];
  		$genero = new generos;
  		$resultado = $genero->insertar_genero($id_genero,$nombre, $conexion);
  	}catch (Exception $e){
			$mensaje = $e->GetMessage();
		  }

  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Insertar generos</title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<script src="js/jquery-2.1.3.min.js"></script>
		<script src="js/videoclub.js"></script>
		<script src="js/dropdown-menu.js"></script>

</head>
<?php include 'menu.html';?>

<body>
	<section class="estilos_form">
		<form action="" method="POST" id="i_generos">
			<fieldset>
				<div class="filas">
					<label for="id_genero">ID Genero:</label>
					<input type="text" name="id_genero">					
				</div>
				<div class="filas">
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre">
				</div>
				<div class="filas">
					<input type="button" value="Insertar" class="button" id="crear_genero">
					<span class="Mensaje" id="Mensaje"><?php echo $mensaje?></span>					
				</div>

			</fieldset>
		</form>
	</section>
</body>
</html>