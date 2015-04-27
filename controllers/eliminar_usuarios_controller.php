<?php
require "../conexion.php";
require "../classes/usuarios_administradores.php";
$usuarios = new usuarios_administradores;

//echo "hola";

if(isset($_POST["id_usuario"])){		
		$usuarios->eliminar_usuarios($_POST["id_usuario"], $conexion);	
}

?>