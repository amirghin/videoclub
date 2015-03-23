<?php 

require "conexion.php";
require "usuarios_administradores.php";

if (isset($_POST['usuario'], $_POST['password'])){
	
	$usuario = new usuarios_administradores;
	$existencia = $usuario->existencia_usuario($_POST['usuario'], $conexion);
	$contrasenas_iguales = $usuario->validar_contrasena($_POST['usuario'], $_POST['password'], $conexion);

	if($existencia AND $contrasenas_iguales){
		echo "usuario y contrasena correctos";
		echo "hola";

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
</head>

<body>
	<form method="POST">
		<table align="right">
			<tr>
				<td>Usuario</td>
				<td><input type="text" name="usuario" id="usuario"></td>
				<td>Contrase&ntilde;a</td>
				<td><input type="password" name="password" id="password"></td>
				<td colspan="2" align="center"><input type="submit" value="Iniciar Sesion"></td>
			</tr>
		</table>
	</form>
</body>

</html>

