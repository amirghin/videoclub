<?php
require "../conexion.php";
require "../classes/actor_director.php";
$actor_director = new actores_directores;

if(isset($_POST["nombre"], $_POST["genero"])){		
	$actor_director->insertar_actores_directores($_POST["nombre"], $_POST["genero"], $conexion);	
}
?>