<?php 

require "conexion.php";
require "usuarios_administradores.php";
$message = "";

if (isset($_POST['usuario'], $_POST['password'])){
	
	$usuario = new usuarios_administradores;
	$existencia = $usuario->existencia_usuario($_POST['usuario'], $conexion);
	$contrasenas_iguales = $usuario->validar_contrasena($_POST['usuario'], $_POST['password'], $conexion);
	if($existencia AND $contrasenas_iguales){
		echo "usuario y contrasena correctos";
		header ("Location: pagina_inicio.php");

	} elseif($existencia) {
		echo "contrasena incorrecta";

	} else {
		$message = "El usuario no existe";
		//echo "el usuario no existe";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Manejo de VideoClub</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>

<body>

	<section class="login_section">
		<h1>Iniciar Sesion</h1>	
		<form method="POST">	
			<fieldset class="login">
				<div class="filas">
				    <label for="usuario">Usuario:</label>
				    <input type="text" name="usuario" id="usuario" required>
			    </div>
			    <div class="filas">
			    	<label for="password">Contrase&ntilde;a:</label>
			    	<input type="password" name="password" id="password" required>
				</div>
				<p class="error"><?php echo $message?></p>
				<div class="filas">
			    	<input type="submit" value="Iniciar Sesion" class="button">
			    </div>
			</fieldset>
		</form>
	</section>
</body>

</html>

