<?php

require "../conexion.php";
require "../classes/reservaciones.php";
require "../classes/peliculas_reservacion.php";
$reservacion = new reservaciones;
session_start();

if(isset($_POST["id_cliente"], $_POST["estado_aprobacion"], $_POST["id_copia"], $_POST["fecha_entrega"], $_POST["fecha_reservacion"], $_POST["fecha_retiro"], $_POST["hora_retiro"], $_SESSION["id_usuario"])){		
		$reservacion->insertar_reservacion($_POST["id_cliente"], $_POST["id_copia"],$_POST["estado_aprobacion"],$_POST["fecha_entrega"], $_POST["fecha_reservacion"], $_POST["fecha_retiro"], $_POST["hora_retiro"], $conexion, $_SESSION["id_usuario"]);	

}

?>