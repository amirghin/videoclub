<?php
require "../conexion.php";
require "../classes/actores_directores.php";
$actor_director = new actores_directores;
session_start();
if(isset($_POST["nombre"], $_POST["genero"])){		
	$actor_director->insertar_actores_directores($_POST["nombre"], $_POST["genero"], $conexion);	
}
?>