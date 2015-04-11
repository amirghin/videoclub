<?php

require "conexion.php";
require "usuarios_administradores.php";


$usuario_administrador = new usuarios_administradores;

if(isset($_POST["nombre_usuario"])){


	$usuario_administrador->buscar_usuarios($_POST["nombre_usuario"], $conexion);
}

?>