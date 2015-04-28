<?php
require "../conexion.php";
require "../classes/actores_directores.php";
$actor_director = new actores_directores;
session_start();
if(isset($_POST["id_actor"])){		
	$actor_director->eliminar_actores_directores($_POST["id_actor"], $conexion);	
}
?>