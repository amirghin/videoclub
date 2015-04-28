<?php
require "../conexion.php";
require "../classes/actores_directores.php";
$actor_director = new actores_directores;
session_start();
if(isset($_POST["id_actor"], $_POST["nombre"], $_POST["genero"], $_SESSION["id_usuario"])){		
	$actor_director->modificar_actores_directores($_POST["id_actor"], $_POST["nombre"], $_POST["genero"], $conexion, $_SESSION["id_usuario"]);	
}
?>