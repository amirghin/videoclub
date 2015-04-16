<?php

$mensaje = "";
$id_pelicula = "";
$nombre_pelicula = "";
$precio_alquiler = "";
$genero = "";
$duracion = "";
$ruta_imagenes = "";

require_once "conexion.php";
require_once "peliculas.php";

if ((isset($_POST['ruta_imagenes']))){
	include_once "ftpupload.php";
}


echo "hola";

if(isset($_POST["id_pelicula"], $_POST["nombre_pelicula"], $_POST["precio_alquiler"], $_POST["genero"],  $_POST["duracion"])){
	echo "hola";
	try{
		$peliculas = new peliculas;
		$id_pelicula = $_POST["id_pelicula"];
		$nombre_pelicula = $_POST["nombre_pelicula"];
		$precio_alquiler = $_POST["precio_alquiler"];
		$genero = $_POST["genero"];
		$ruta_imagenes = ($_FILES["ruta_imagenes"]["name"]);
		$duracion = $_POST["duracion"];
		$peliculas->insertar_peliculas($id_pelicula,$nombre_pelicula,$precio_alquiler,$genero,$ruta_imagenes,$duracion,$conexion);	
	}catch (Exception $e){
			$mensaje = $e->GetMessage();
	}

}

?>

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
		<form method="POST" enctype="multipart/form-data" action="">		
			<fieldset class="insertar_peliculas">
				<div class="filas">
			    	<label for="nombre">ID Pelicula: </label>
			    	<input type="text" name="id_pelicula" id="id_pelicula">
				</div>
				<div class="filas">	
			    	<label for="nombre">Nombre Pelicula: </label>
			    	<input type="text" name="nombre_pelicula" id="nombre_pelicula">
			    </div>

				<div class="filas">
					<label for="precio_alquiler">Precio de alquiler:</label>
					<input type="text" name="precio_alquiler">
				</div>
				<div class="filas">
					<label for="duracion">Duracion :</label>
					<input type="text" name="duracion">
				</div>
				<div class="filas">
					<label for="genero">Genero:</label>
					<!--<select name="genero" id=""></select><!-- TODO llenar con dropdown de genero-->
					<input type="text" name="genero">
				</div>
				<div class="filas">
					<label for="ruta_imagenes">Ruta de imagenes: </label>
					<input type="file" name="ruta_imagenes"/>
				</div>
				<div class="filas">
			    	<input type="button" value="Insertar" class="button" id="">
			    	<input type="hidden" name="action" value="upload" /> 
			    	<?php echo $mensaje?>


			    </div>
			</fieldset>
		</form>
	</section>
</body>

</html>
