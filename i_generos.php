<?php
$mensaje = "";  
  require_once("conexion.php");
  include_once("generos.php");

  if ((isset($_POST['id_genero'], $_POST['nombre']))){
  	echo "hola";
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

</head>
<?php include 'menu.html';?>

<body>
	<section class="estilos_form">
		<form action="i_generos.php" method="POST" >
			<fieldset>
				<div class="filas">
					<label for="id_genero">ID Genero</label>
					<input type="text" name="id_genero">					
				</div>
				<div class="filas">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre">
				</div>
				<input type="submit">
				<span class="Mensaje" id="Mensaje"><?php echo $mensaje?></span>
			</fieldset>
		</form>
	</section>
</body>
</html>