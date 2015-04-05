<?php 

require "conexion.php";
require "usuarios_administradores.php";

if (isset($_POST['usuario'], $_POST['password'])){
	
	$usuario = new usuarios_administradores;
	$existencia = $usuario->existencia_usuario($_POST['usuario'], $conexion);
	$contrasenas_iguales = $usuario->validar_contrasena($_POST['usuario'], $_POST['password'], $conexion);

	if($existencia AND $contrasenas_iguales){
		echo "usuario y contrasena correctos";

	} elseif($existencia) {
		echo "contrasena incorrecta";

	} else {
		echo "el usuario no existe";
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
	<form method="POST">		
		<fieldset class="login">
		    <label for="usuario">Usuario</label>
		    <input type="text" name="usuario" id="usuario">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" name="password" id="password">
		    <input type="submit" value="Iniciar Sesion">
		</fieldset>
		
	</form>
</body>

</html>

