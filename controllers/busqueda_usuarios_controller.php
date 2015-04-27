<?php
require "../conexion.php";
require "../classes/usuarios_administradores.php";
$usuarios = new usuarios_administradores;

//echo "hola";

if(isset($_POST["nombre_usuario"])){		
		$usuarios->buscar_usuarios($_POST["nombre_usuario"], $conexion);	
}

?>