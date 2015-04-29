<?php

require "../conexion.php";
require "../classes/personajes.php";
$personajes = new personajes;
session_start();
if(isset($_POST["id_pelicula"], $_POST["roles_id_rol"], $_POST["actores_id_actor"], $_SESSION["id_usuario"])){		
		$personajes->insertar_personajes($_POST["id_pelicula"], $_POST["roles_id_rol"], $_POST["actores_id_actor"], $conexion, $_SESSION["id_usuario"]);	
}

?>